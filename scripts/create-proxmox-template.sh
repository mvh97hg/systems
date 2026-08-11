#!/usr/bin/env bash

set -euo pipefail

# ==========================
# CONFIG
# ==========================

STORAGE="${STORAGE:-local-lvm}"
BRIDGE="${BRIDGE:-vmbr0}"
MEMORY="${MEMORY:-2048}"
CORES="${CORES:-2}"
ISO_DIR="/var/lib/vz/template/iso"

# ==========================
# CHECK ARG
# ==========================

if [[ $# -ne 1 ]]; then
    echo "Usage:"
    echo "  $0 debian13"
    echo "  $0 ubuntu24"
    echo "  $0 ubuntu22"
    echo "  $0 rocky9"
    echo "  $0 almalinux9"
    exit 1
fi

DISTRO="$1"

# ==========================
# DISTRO MAP
# ==========================

case "$DISTRO" in

    debian13)
        NAME="debian-13"
        IMAGE_URL="https://cloud.debian.org/images/cloud/trixie/latest/debian-13-generic-amd64.qcow2"
        ;;

    ubuntu24)
        NAME="ubuntu-24.04"
        IMAGE_URL="https://cloud-images.ubuntu.com/noble/current/noble-server-cloudimg-amd64.img"
        ;;

    ubuntu22)
        NAME="ubuntu-22.04"
        IMAGE_URL="https://cloud-images.ubuntu.com/jammy/current/jammy-server-cloudimg-amd64.img"
        ;;

    rocky9)
        NAME="rocky-9"
        IMAGE_URL="https://download.rockylinux.org/pub/rocky/9/images/x86_64/Rocky-9-GenericCloud.latest.x86_64.qcow2"
        ;;

    almalinux9)
        NAME="almalinux-9"
        IMAGE_URL="https://repo.almalinux.org/almalinux/9/cloud/x86_64/images/AlmaLinux-9-GenericCloud-latest.x86_64.qcow2"
        ;;

    *)
        echo "Unsupported distro: $DISTRO"
        exit 1
        ;;
esac

# ==========================
# VMID
# ==========================

VID=$(pvesh get /cluster/nextid)

mkdir -p "$ISO_DIR"
cd "$ISO_DIR"

IMAGE_FILE=$(basename "$IMAGE_URL")

echo "================================="
echo "Template : $NAME"
echo "VMID     : $VID"
echo "Image    : $IMAGE_FILE"
echo "================================="

# ==========================
# DOWNLOAD
# ==========================

if [[ ! -f "$IMAGE_FILE" ]]; then
    echo "[+] Downloading image..."
    wget -O "$IMAGE_FILE" "$IMAGE_URL"
else
    echo "[+] Image already exists"
fi

# ==========================
# INSTALL QGA
# ==========================

if command -v virt-customize >/dev/null 2>&1; then

    echo "[+] Installing qemu-guest-agent"

    virt-customize \
        -a "$IMAGE_FILE" \
        --install qemu-guest-agent

else
    echo "[!] virt-customize not found"
    echo "    apt install -y libguestfs-tools"
fi

# ==========================
# CREATE VM
# ==========================

echo "[+] Creating VM"

qm create "$VID" \
    --name "$NAME" \
    --memory "$MEMORY" \
    --cores "$CORES" \
    --cpu host \
    --machine q35 \
    --net0 virtio,bridge="$BRIDGE"

# ==========================
# IMPORT DISK
# ==========================

echo "[+] Import disk"

qm importdisk "$VID" "$IMAGE_FILE" "$STORAGE"

# ==========================
# ATTACH DISK
# ==========================

echo "[+] Attach disk"

qm set "$VID" \
    --scsihw virtio-scsi-single \
    --scsi0 "$STORAGE:vm-${VID}-disk-0"

# ==========================
# CLOUD INIT
# ==========================

echo "[+] Configure Cloud-Init"

qm set "$VID" \
    --ide2 "$STORAGE:cloudinit"

# ==========================
# BOOT
# ==========================

qm set "$VID" \
    --boot order=scsi0

# ==========================
# SERIAL CONSOLE
# ==========================

qm set "$VID" \
    --serial0 socket \
    --vga serial0

# ==========================
# AGENT
# ==========================

qm set "$VID" \
    --agent enabled=1

# ==========================
# OPTIONAL
# ==========================

qm set "$VID" \
    --ostype l26

qm set "$VID" \
    --ipconfig0 ip=dhcp

# ==========================
# TEMPLATE
# ==========================

echo "[+] Convert to template"

qm template "$VID"

echo ""
echo "========================================"
echo "SUCCESS"
echo "Template : $NAME"
echo "VMID     : $VID"
echo "========================================"