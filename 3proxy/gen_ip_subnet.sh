#!/bin/bash
used_ipv6=()

readarray -t used_ipv6 <<< $((/sbin/ip -6 -o addr show scope global | awk '{gsub(/\/.*/,"",$4); print $4}') | sed 's/ /\n/g')
# Hàm để tạo địa chỉ IPv6 ngẫu nhiên từ 0001 đến ffff
generate_random_ipv6() {
  random_part=$(printf "%04x" $((RANDOM % 65536)))
  ipv6="2001:df7:7e80:100:1bf1:7920:8669:$random_part"
  echo "$ipv6/112"
}

# Mảng để lưu trữ các địa chỉ IPv6 đã được sử dụng


# Tạo và ghi 1000 địa chỉ IPv6 vào tệp /etc/network/interfaces
for ((i = 1; i <= 1000; i++)); do
  while true; do
    random_ipv6=$(generate_random_ipv6)
    # Kiểm tra xem địa chỉ IPv6 đã được sử dụng chưa
    if ! [[ "${used_ipv6[@]}" =~ "$random_ipv6" ]]; then
      used_ipv6+=("$random_ipv6")
      break
    fi
  done
  echo "up /sbin/ifconfig eth0 inet6 add $random_ipv6" >> /etc/network/interfaces
done

echo "Xong"