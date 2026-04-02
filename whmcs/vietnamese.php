<?php
/**
 * WHMCS Language File
 * Vietnamese (vi)
 *
 * Please Note: These language files are overwritten during software updates
 * and therefore editing of these files directly is not advised. Instead we
 * recommend that you use overrides to customise the text displayed in a way
 * which will be safely preserved through the upgrade process.
 *
 * For instructions on overrides, please visit:
 *   http://docs.whmcs.com/Language_Overrides
 *
 * @author     H2N dev
 * @company    TopCloud
 * @website    https://topcloud.vn
 * @email      contact.topcloud@gmail.com
 */
$tenwweb = $_SERVER["HTTP_HOST"];
$tenweb = strtoupper($tenwweb);
if (!defined("WHMCS")) die("This file cannot be accessed directly");

$_LANG['locale'] = "vi_VN";
$_LANG['cart']['applyCreditAmountNoFurtherPayment'] = "Sử dụng <span>:amount</span> VND từ số dư tài khoản của bạn để thanh toán.";
$_LANG['accountinfo'] = "Thông tin tài khoản";
$_LANG['accountstats'] = "Thống kê tài khoản";
$_LANG['addfunds'] = "Nạp tiền";
$_LANG['addfundsamount'] = "Số tiền muốn nạp";
$_LANG['addfundsmaximum'] = "Số tiền nạp tối đa";
$_LANG['addfundsmaximumbalance'] = "Số dư tài khoản tối đa";
$_LANG['addfundsmaximumbalanceerror'] = "Số dư tài khoản tối đa là";
$_LANG['addfundsmaximumerror'] = "Số tiền nạp tối đa là";
$_LANG['addfundsminimum'] = "Số tiền nạp tối thiểu";
$_LANG['addfundsminimumerror'] = "Số tiền nạp tối thiểu là";
$_LANG['addmore'] = "Thêm";
$_LANG['addtocart'] = "Đăng Ký";
$_LANG['affiliatesactivate'] = "Đăng ký tham gia chương trình cộng tác viên";
$_LANG['affiliatesamount'] = "Số tiền";
$_LANG['affiliatesbalance'] = "Số dư hiện tại";
$_LANG['affiliatesbullet1'] = "Bạn sẽ nhận được 10% số tiền do khách hàng của bạn giới thiệu thanh toán cho các dịch vụ sau: Hosting, Domain, VPS, Email";
$_LANG['affiliatesbullet2'] = "Với dịch vụ Thiết kế website mức chia sẽ doanh thu là 20% một lần duy nhất.";
$_LANG['affiliatescommission'] = "Hoa hồng";
$_LANG['affiliatesdescription'] = "Cơ hội kinh doanh tuyệt vời dành cho bạn với những mức chiết khấu cực cao";
$_LANG['affiliatesdisabled'] = "Chương trình cộng tác viên hiện tại không áp dụng với các tài khoản khách hàng.";
$_LANG['affiliatesearn'] = "Thu nhập";
$_LANG['affiliatesearningstodate'] = "Tổng thu nhập tính đến ngày";
$_LANG['affiliatesfootertext'] = "- Khách hàng bạn giới thiệu phải sử dụng dịch vụ ít nhất 1 tháng, và phần lợi nhuận bạn sẽ được ghi vào tài khoản của bạn và được thanh toán vào cuối tháng (tính từ lúc khách hàng của bạn đăng ký sử dụng dịch vụ).<br/><br/>- Chương trình chia sẽ doanh thu là một chương trình hợp tác giữa bạn và $tenweb đôi bên cùng có lợi, bạn giới thiệu thêm khách hàng cho $tenweb, $tenweb sẽ chia sẽ lợi nhuận lại cho bạn. Vì vậy tất cả các giới thiệu không đem lại doanh thu cũng như lợi nhuận cho $tenweb, $tenweb sẽ không chia sẽ lại doanh thu cho bạn.<br/><br/>- Với các dịch vụ “Thuê Server riêng”, “Thuê chỗ đặt Server”, “Thiết kế website” có thể chấp nhận giới thiệu không thông qua link giới thiệu, ngoài ra tất cả các dịch vụ khác phải được giới thiệu trực tuyến trên Internet qua link giới thiệu do $tenweb cung cấp.<br/><br/>- Số tiền hoa hồng trong tài khoản của bạn có thể dùng để thanh toán dịch vụ của $tenweb, hoặc có thể rút ra bằng tiền mặt.<br/><br/>- Số tiền hoa hồng của bạn phải từ 500,000 VNĐ trở lên bạn mới có thể rút ra hoặc sử dụng.<br/><br/>- Giới thiệu link chia sẻ doanh thu của bạn lên các diễn đàn, blog, hay trang web của riêng bạn dưới dạng liên kết hoặc banner, chúng tôi không ủng hộ hình thức spam, việc chia sẻ doanh thu chấm dứt nếu bạn spam làm ảnh hưởng đến uy tín của $tenweb. Không chấp nhận việc tự giới thiệu cho bản thân.";
$_LANG['affiliateshostingpackage'] = "Gói Hosting";
$_LANG['affiliatesintrotext'] = "Bạn đang hoạt động và kinh doanh trong lĩnh vực Web, dịch vụ mạng và dịch vụ trực tuyến, bạn là sinh viên, học sinh … Bạn muốn kiếm tiền trên Internet? Hãy tham gia chương trình chia sẻ doanh thu trực tuyến cùng $tenweb.";
$_LANG['affiliateslinktous'] = "Liên kết tới $tenweb";
$_LANG['affiliatesnosignups'] = "Bạn chưa giới thiệu được khách hàng nào";
$_LANG['affiliatesrealtime'] = "Thông tin thống kê sẽ được cập nhật ngay lập tức khi có sự thay đổi";
$_LANG['affiliatesreferallink'] = "Giới thiệu nhận ngay 10% khi đơn hàng được thanh toán";
$_LANG['affiliatesreferals'] = "Thông tin chi tiết";
$_LANG['affiliatesregdate'] = "Ngày đăng ký";
$_LANG['affiliatesrequestwithdrawal'] = "Gửi yêu cầu thanh toán";
$_LANG['affiliatessignupdate'] = "Ngày đăng ký";
$_LANG['affiliatesstatus'] = "Tình trạng";
$_LANG['affiliatestitle'] = "Affiliates";
$_LANG['affiliatesvisitorsreferred'] = "Số lượng truy cập đã giới thiệu";
$_LANG['affiliateswithdrawalrequestsuccessful'] = "Yêu cầu thanh toán tiền hoa hồng của bạn đã được gửi tới bộ phận chuyên trách. Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất.";
$_LANG['affiliateswithdrawn'] = "Tổng số tiền hoa hồng đã nhận";
$_LANG['all'] = "Tất cả";
$_LANG['alreadyregistered'] = "Bạn đã có tài khoản?";
$_LANG['announcementsdescription'] = "Xem các thông báo mới nhất";
$_LANG['announcementsnone'] = "Hiện tại chưa có thông báo nào";
$_LANG['announcementsrss'] = "Xem RSS Feed";
$_LANG['announcementstitle'] = "Thông báo";
$_LANG['bannedbanexpires'] = "Thời hạn";
$_LANG['bannedbanreason'] = "Lý do";
$_LANG['bannedhasbeenbanned'] = "đã bị khóa";
$_LANG['bannedtitle'] = "IP đã bị khóa";
$_LANG['bannedyourip'] = "Địa chỉ IP của bạn";
$_LANG['cartaddons'] = "Dịch vụ gia tăng";
$_LANG['cartbrowse'] = "Duyệt danh mục sản phẩm / dịch vụ";
$_LANG['cartconfigdomainextras'] = "Cấu hình dịch vụ / tên miền";
$_LANG['cartconfigoptionsdesc'] = "Vui lòng lựa chọn cấu hình cho dịch vụ quý khách muốn đăng ký theo tùy chọn dưới đây.";
$_LANG['cartconfigserver'] = "Cấu hình máy chủ";
$_LANG['cartcustomfieldsdesc'] = "This product/service requires some additional information from you to allow us to process your order.";
$_LANG['cartdomainsconfig'] = "Đăng ký tên miền";
$_LANG['cartdomainsconfigdesc'] = "Below you can configure the domain names in your shopping cart selecting the addon services you would like, providing required information for them and defining the nameservers that they will use.";
$_LANG['cartdomainshashosting'] = "Đã bao gồm Hosting";
$_LANG['cartdomainsnohosting'] = "Đăng ký thêm Hosting cho tên miền này?";
$_LANG['carteditproductconfig'] = "Chỉnh sửa cấu hình";
$_LANG['cartempty'] = "Giỏ hàng đang rỗng";
$_LANG['cartemptyconfirm'] = "Bạn muốn làm rỗng giỏ hàng?";
$_LANG['cartexistingclientlogin'] = "Đăng nhập";
$_LANG['cartexistingclientlogindesc'] = "Bạn cần đăng nhập để thêm đơn hàng này vào tài khoản của bạn.";
$_LANG['cartnameserversdesc'] = "Nếu quý khách không muốn quản lý DNS tại $tenweb, hãy nhập Nameserver của dịch vụ DNS của quý khách vào bên dưới.";
$_LANG['cartproductaddons'] = "Dịch vụ bổ sung";
$_LANG['cartproductaddonschoosepackage'] = "Chọn gói dịch vụ";
$_LANG['cartproductaddonsnone'] = "Hiện không có sẵn sản phẩm / dịch vụ bổ sung nào";
$_LANG['cartproductconfig'] = "Cấu hình dịch vụ";
$_LANG['cartproductdesc'] = "Vui lòng thiết lập dịch vụ / sản phẩm quý khách muốn đăng ký theo tùy chọn dưới đây.";
$_LANG['cartproductdomain'] = "Tên miền";
$_LANG['cartproductdomainchoose'] = "Chọn tên miền";
$_LANG['cartproductdomaindesc'] = "Vui lòng cung cấp tên miền quý khách muốn sử dụng cho dịch vụ / sản phẩm đang đăng ký theo các tùy chọn dưới đây.";
$_LANG['cartproductdomainuseincart'] = "Sử dụng tên miền trong giỏ hàng của tôi";
$_LANG['cartremove'] = "Hủy";
$_LANG['cartremoveitemconfirm'] = "Bạn chắc chắn muốn xóa dịch vụ / sản phẩm này khỏi giỏ hàng ?";
$_LANG['carttaxupdateselections'] = "Tax may be charged depending upon the state and country selections you make. Click to recalculate after making your choices.";
$_LANG['carttaxupdateselectionsupdate'] = "Cập nhật";
$_LANG['carttitle'] = "Đặt hàng";
$_LANG['changessavedsuccessfully'] = "Thay đổi đã được lưu!";
$_LANG['checkavailability'] = "Kiểm tra tính khả dụng";
$_LANG['checkout'] = "Thanh toán";
$_LANG['choosecurrency'] = "Tiền tệ";
$_LANG['choosedomains'] = "Lựa chọn tên miền";
$_LANG['clickheretologin'] = "Đăng nhập";
$_LANG['clientareaaccountaddons'] = "Account Addons";
$_LANG['clientareaactive'] = "Đang sử dụng";
$_LANG['clientareaaddfundsdisabled'] = "Chúng tôi không cho phép gửi tiền trước với chúng tôi vào thời điểm hiện tại.";
$_LANG['clientareaaddfundsnotallowed'] = "Bạn phải có ít nhất một đơn hàng đang hoạt động trước khi có thể thêm tiền nên bạn không thể tiếp tục vào thời điểm hiện tại!";
$_LANG['clientareaaddon'] = "Addon";
$_LANG['clientareaaddonorderconfirmation'] = "Cảm ơn. Đơn đặt hàng của bạn cho addon hiển thị bên dưới đã được đặt. Vui lòng chọn phương thức thanh toán của bạn từ bên dưới.";
$_LANG['clientareaaddonpricing'] = "Giá";
$_LANG['clientareaaddonsfor'] = "Bổ sung cho";
$_LANG['clientareaaddress1'] = "Địa chỉ 1";
$_LANG['clientareaaddress2'] = "Địa chỉ 2";
$_LANG['clientareabwlimit'] = "Giới hạn băng thông";
$_LANG['clientareabwusage'] = "Băng thông sử dụng";
$_LANG['clientareacancel'] = "Hủy dịch vụ";
$_LANG['clientareacancelconfirmation'] = "Yêu cầu hủy dịch vụ của bạn đã được gửi đến bộ phận chuyên trách. Nếu bạn muốn hủy bỏ yêu cầu này, vui lòng gửi ticket đến bộ phận hỗ trợ kỹ thuật trong vòng 24h.";
$_LANG['clientareacancelinvalid'] = "Yêu cầu hủy dịch vụ không thành công do đã có 1 yêu cầu hủy từ trước.";
$_LANG['clientareacancellationendofbillingperiod'] = "Sau khi hết hạn";
$_LANG['clientareacancellationimmediate'] = "Ngay lập tức";
$_LANG['clientareacancellationtype'] = "Hình thức hủy";
$_LANG['clientareacancelled'] = "Đã hủy";
$_LANG['clientareacancelproduct'] = "Yêu cầu hủy dịch vụ - GIÚP DỊCH VỤ CỦA BẠN BỊ HUỶ CHỨ KHÔNG CÓ TÁC DỤNG HOÀN TIỀN HAY BẤT CỨ KẾT QUẢ NÀO KHÁC!<br>Gói dịch vụ: ";
$_LANG['clientareacancelreason'] = "Mô tả ngắn gọn lý do Hủy dịch vụ của bạn";
$_LANG['clientareacancelrequest'] = "Yêu cầu hủy tài khoản";
$_LANG['clientareacancelrequestbutton'] = "Hủy dịch vụ";
$_LANG['clientareachangepassword'] = "Thay đổi mật khẩu";
$_LANG['clientareachangesuccessful'] = "Thông tin của bạn đã được thay đổi thành công";
$_LANG['clientareachoosecontact'] = "Chọn thông tin liên hệ";
$_LANG['clientareacity'] = "Tỉnh / Thành phố";
$_LANG['clientareacompanyname'] = "Công ty";
$_LANG['clientareaconfirmpassword'] = "Xác nhận mật khẩu";
$_LANG['clientareacontactsemails'] = "Thiết lập thông báo";
$_LANG['clientareacontactsemailsdomain'] = "Nhận các Email Tên miền - Thông báo gia hạn, hết hạn, xác nhận đăng ký ... tên miền";
$_LANG['clientareacontactsemailsgeneral'] = "Nhận các Email Chung - Thông báo chung, tin tức & sự kiện mới";
$_LANG['clientareacontactsemailsinvoice'] = "Nhận các Email Hóa đơn - Chi tiết hóa đơn & hợp đồng";
$_LANG['clientareacontactsemailsproduct'] = "Nhận các Email Dịch vụ - Chi tiết đơn hàng, thông tin quản lý dịch vụ...";
$_LANG['clientareacontactsemailssupport'] = "Nhận các Email Hỗ trợ - Hệ thống ticket & các hỗ trợ khác";
$_LANG['clientareacountry'] = "Quốc gia";
$_LANG['clientareacurrentsecurityanswer'] = "Vui lòng điền câu trả lời hiện tại của bạn";
$_LANG['clientareacurrentsecurityquestion'] = "Vui lòng chọn câu hỏi bí mật hiện tại của bạn";
$_LANG['clientareadeletecontact'] = "Xóa liên hệ";
$_LANG['clientareadeletecontactareyousure'] = "Vui lòng xác nhận bạn muốn xóa liên hệ này?";
$_LANG['userLogin']['createAccount'] = "Tạo tài khoản";
$_LANG['userLogin']['signInToContinue'] = "Hãy đăng nhập để tiếp tục sử dụng dịch vụ.";
$_LANG['userLogin']['notRegistered'] = "Bạn chưa có tài khoản?";
$_LANG['announcementscontinue'] = "Xem đầy đủ";
$_LANG['clientareadescription'] = "Cập nhật thông tin tài khoản";
$_LANG['clientareadisklimit'] = "Giới hạn dung lượng";
$_LANG['clientareadiskusage'] = "Dung lượng sử dụng";
$_LANG['clientareadomainexpirydate'] = "Ngày hết hạn";
$_LANG['clientareadomainnone'] = "Chưa đăng ký tên miền nào";
$_LANG['clientareaemail'] = "Địa chỉ Email";
$_LANG['clientareaemails'] = "Lịch sử Email";
$_LANG['clientareaemailsdate'] = "Ngày gửi";
$_LANG['clientareaemailsintrotext'] = "Dưới đây là danh sách tất cả tin nhắn chúng tôi đã gửi cho bạn. Điều này giúp bạn dễ dàng theo dõi & không bị lỡ các email thông báo quan trọng từ hệ thống.";
$_LANG['clientareaemailssubject'] = "Tiêu đề";
$_LANG['clientareaerroraddress1'] = "Bạn chưa nhập địa chỉ";
$_LANG['clientareaerroraddress12'] = "Địa chỉ chỉ chấp nhận các ký tự a-z, A-Z, số và dấu cách";
$_LANG['clientareaerrorbannedemail'] = "Địa chỉ Email bạn đã nhập không hợp lệ. Vui lòng thử lại một địa chỉ Email khác.";
$_LANG['clientareaerrorcity'] = "Bạn chưa nhập tỉnh / thành phố";
$_LANG['clientareaerrorcity2'] = "Tỉnh / thành phố chỉ chấp nhận các ký tự a-z, A-Z và số";
$_LANG['clientareaerrorcountry'] = "Vui lòng chọn quốc gia";
$_LANG['clientareaerroremail'] = "Bạn chưa nhập địa chỉ Email";
$_LANG['clientareaerroremailinvalid'] = "Địa chỉ Email đã nhập chưa chính xác";
$_LANG['clientareaerrorfirstname'] = "Bạn chưa nhập tên";
$_LANG['clientareaerrorfirstname2'] = "Tên chỉ chấp nhận các ký tự a-z, A-Z";
$_LANG['clientareaerrorisrequired'] = "bắt buộc";
$_LANG['clientareaerrorlastname'] = "Bạn chưa nhập tên họ";
$_LANG['clientareaerrorlastname2'] = "Họ chỉ chấp nhận các ký tự a-z, A-Z";
$_LANG['clientareaerroroccured'] = "Có lỗi xảy ra. Vui lòng thử lại.";
$_LANG['clientareaerrorpasswordconfirm'] = "Bạn chưa xác nhận lại mật khẩu";
$_LANG['clientareaerrorpasswordnotmatch'] = "Mật khẩu đã nhập chưa chính xác";
$_LANG['clientareaerrorphonenumber'] = "Bạn chưa nhập số điện thoại";
$_LANG['clientareaerrorphonenumber2'] = "Số điện thoại đã nhập chưa chính xác";
$_LANG['clientareaerrorpostcode'] = "Bạn chưa nhập postcode";
$_LANG['clientareaerrorpostcode2'] = "Postcode chỉ chấp nhận các ký tự a-z, A-Z, số và dấu cách";
$_LANG['clientareaerrors'] = "Có lỗi xảy ra như sau:";
$_LANG['clientareaerrorstate'] = "Bạn chưa nhập vùng (state)";
$_LANG['clientareaexpired'] = "Đã hết hạn";
$_LANG['clientareafirstname'] = "Tên";
$_LANG['clientareafraud'] = "Fraud";
$_LANG['clientareafullname'] = "Khách hàng";
$_LANG['clientareaheader'] = "Chào mừng bạn đến với khu vực khách hàng của chúng tôi, nơi bạn có thể quản lý tài khoản của mình với chúng tôi. Trang này cung cấp tổng quan ngắn gọn về tài khoản của bạn bao gồm mọi yêu cầu hỗ trợ mở và hóa đơn chưa thanh toán. Hãy đảm bảo bạn luôn cập nhật thông tin liên lạc của mình.";
$_LANG['clientareahostingaddons'] = "Dịch vụ bổ sung";
$_LANG['clientareahostingaddonsintro'] = "You have the following addons for this product.";
$_LANG['clientareahostingaddonsview'] = "Hiển thị";
$_LANG['clientareahostingamount'] = "Thành tiền";
$_LANG['clientareahostingdomain'] = "Tên miền";
$_LANG['clientareahostingnextduedate'] = "Ngày hết hạn";
$_LANG['clientareahostingpackage'] = "Gói dịch vụ";
$_LANG['clientareahostingregdate'] = "Ngày đăng ký";
$_LANG['clientarealastname'] = "Họ";
$_LANG['clientarealastupdated'] = "Cập nhật cuối";
$_LANG['clientarealeaveblank'] = "Để trống nếu bạn không muốn thay đổi mật khẩu.";
$_LANG['clientareamodifydomaincontactinfo'] = "Chỉnh sửa thông tin liên hệ";
$_LANG['clientareamodifynameservers'] = "Chỉnh sửa Nameservers";
$_LANG['clientareamodifywhoisinfo'] = "Chỉnh sửa thông tin WHOIS tên miền";
$_LANG['clientareanameserver'] = "Nameserver";
$_LANG['clientareanavaddcontact'] = "Thêm thông tin liên hệ mới";
$_LANG['clientareanavchangecc'] = "Change Credit Card Details";
$_LANG['clientareanavchangepw'] = "Thay đổi mật khẩu";
$_LANG['clientareanavdetails'] = "Thông tin tài khoản";
$_LANG['clientareanavdomains'] = "Quản lý tên miền";
$_LANG['clientareanavhome'] = "Home";
$_LANG['clientareanavlogout'] = "Đăng xuất";
$_LANG['clientareanavorder'] = "Đặt hàng dịch vụ khác";
$_LANG['clientareanavsecurityquestions'] = "Thay đổi câu hỏi bí mật";
$_LANG['clientareanavservices'] = "Quản lý dịch vụ";
$_LANG['clientareanavsupporttickets'] = "Quản lý Ticket";
$_LANG['clientareanocontacts'] = "Không tìm thấy thông tin liên hệ";
$_LANG['clientareapassword'] = "Mật khẩu";
$_LANG['clientareapending'] = "Đang cập nhật dịch vụ";
$_LANG['clientareapendingtransfer'] = "Đang chờ chuyển";
$_LANG['clientareaphonenumber'] = "Điện thoại";
$_LANG['clientareapostcode'] = "Zip Code";
$_LANG['clientareaproductdetails'] = "Chi tiết dịch vụ";
$_LANG['clientareaproducts'] = "Quản lý Sản phẩm / Dịch vụ";
$_LANG['clientareaproductsnone'] = "Bạn chưa đăng ký sản phẩm / dịch vụ nào";
$_LANG['clientarearegistrationperiod'] = "Thời gian đăng ký";
$_LANG['clientareasavechanges'] = "Lưu thay đổi";
$_LANG['clientareasecurityanswer'] = "Vui lòng điền câu trả lời";
$_LANG['clientareasecurityconfanswer'] = "Vui lòng xác nhận câu trả lời";
$_LANG['clientareasecurityquestion'] = "Vui lòng chọn một câu hỏi bí mật";
$_LANG['clientareaselectcountry'] = "Quốc gia";
$_LANG['clientareasetlocking'] = "Set Locking";
$_LANG['clientareastate'] = "Khu vực";
$_LANG['clientareastatus'] = "Tình trạng";
$_LANG['clientareasuspended'] = "Tạm ngưng";
$_LANG['clientareaterminated'] = "Đã xóa";
$_LANG['clientareaticktoenable'] = "Kích hoạt";
$_LANG['clientareatitle'] = "Portal";
$_LANG['clientareaunlimited'] = "∞";
$_LANG['clientareaupdatebutton'] = "Cập nhật";
$_LANG['clientareaupdateyourdetails'] = "Cập nhật thông tin";
$_LANG['clientareaused'] = "Đã sử dụng";
$_LANG['clientareaviewaddons'] = "Dịch vụ bổ sung";
$_LANG['clientareaviewdetails'] = "Xem chi tiết";
$_LANG['clientlogin'] = "Đăng nhập";
$_LANG['clientregisterheadertext'] = "Vui lòng điền các thông tin dưới đây để đăng ký tài khoản mới.";
$_LANG['clientregistertitle'] = "Đăng ký tài khoản";
$_LANG['clientregisterverify'] = "Xác nhận đăng ký";
$_LANG['clientregisterverifydescription'] = "Xin vui lòng nhập các ký tự mà bạn nhìn thấy trong hình dưới đây vào hộp văn bản được cung cấp. Điều này rất cần thiết để ngăn chặn SPAM.";
$_LANG['clientregisterverifyinvalid'] = "Mã xác nhận đã nhập chưa chính xác";
$_LANG['closewindow'] = "Đóng cửa sổ";
$_LANG['completeorder'] = "Đặt Hàng";
$_LANG['confirmnewpassword'] = "Xác nhận mật khẩu mới";
$_LANG['contactemail'] = "Email";
$_LANG['contacterrormessage'] = "Bạn chưa nhập nội dung";
$_LANG['contacterrorname'] = "Bạn chưa nhập họ & tên";
$_LANG['contacterrorsubject'] = "Bạn chưa nhập tiêu đề";
$_LANG['contactheader'] = "Nếu bạn có bất kỳ câu hỏi nào cần giải đáp hoặc muốn liên hệ với chúng tôi, vui lòng sử dụng mẫu dưới đây.";
$_LANG['contactmessage'] = "Nội dung";
$_LANG['contactname'] = "Họ & Tên";
$_LANG['contactsend'] = "Gửi";
$_LANG['contactsent'] = "Tin nhắn của bạn đã được gửi đến bộ phận chuyên trách";
$_LANG['contactsubject'] = "Tiêu đề";
$_LANG['contacttitle'] = "Liên hệ";
$_LANG['continueshopping'] = "Tiếp tục đặt hàng";
$_LANG['creditcard'] = "Thanh toán bằng thẻ tín dụng";
$_LANG['creditcard3dsecure'] = "As part of our fraud prevention measures, you will now be asked to perform the Verified by Visa or Mastercard SecureCode verification to complete your payment.<br /><br />Do not click the refresh or back button or this transaction may be interrupted or cancelled.";
$_LANG['creditcardcardexpires'] = "Ngày hết hạn";
$_LANG['creditcardcardissuenum'] = "Ngày cấp";
$_LANG['creditcardcardnumber'] = "Số thẻ";
$_LANG['creditcardcardstart'] = "Ngày bắt đầu";
$_LANG['creditcardcardtype'] = "Loại thẻ";
$_LANG['creditcardccvinvalid'] = "Số CVV của thẻ là bắt buộc";
$_LANG['creditcardconfirmation'] = "Thank You! Your new card details have been accepted and the first payment for your account has been taken. You have been sent a confirmation email about this.";
$_LANG['creditcardcvvnumber'] = "CVV/CVC2 Number";
$_LANG['creditcardcvvwhere'] = "Where do I find this?";
$_LANG['creditcarddeclined'] = "The credit card details you entered were declined. Please try a different card or contact support.";
$_LANG['creditcarddetails'] = "Credit Card Details";
$_LANG['creditcardenterexpirydate'] = "You did not enter the card expiry date";
$_LANG['creditcardenternewcard'] = "Enter New Card Information Below";
$_LANG['creditcardenternumber'] = "You did not enter your card number";
$_LANG['creditcardinvalid'] = "The credit card details you entered were invalid. Please try a different card or contact support.";
$_LANG['creditcardnumberinvalid'] = "The credit card number you entered is invalid";
$_LANG['creditcardsecuritynotice'] = "Any data you enter here is submitted securely and is encrypted to reduce the risk of fraud";
$_LANG['creditcarduseexisting'] = "Sử dụng thẻ có sẵn";
$_LANG['customfieldvalidationerror'] = "giá trị chưa chính xác";
$_LANG['days'] = "Ngày";
$_LANG['defaultbillingcontact'] = "Thông tin thanh toán mặc định";
$_LANG['domainalternatives'] = "Thử hình thức khác:";
$_LANG['domainavailable'] = "Có sẵn! Đăng ký ngay";
$_LANG['domainavailable1'] = "Tên miền";
$_LANG['domainavailable2'] = "đang có sẵn!";
$_LANG['domainavailableexplanation'] = "Click vào link dưới để đăng ký tên miền này";
$_LANG['domainbulksearch'] = "Kiểm tra nhiều tên miền";
$_LANG['domainbulksearchintro'] = "Nhập tối đa 20 tên miền quý khách muốn đăng ký vào ô dưới đây, mỗi tên miền một dòng. Không bao gồm http:// hoặc www";
$_LANG['domainbulktransferdescription'] = "Nhập tối đa 20 tên miền quý khách muốn chuyển quản lý vào ô dưới đây, mỗi tên miền một dòng. Không bao gồm http:// hoặc www";
$_LANG['domainbulktransfersearch'] = "Chuyển nhiều tên miền về $tenweb";
$_LANG['domaincheckerdescription'] = "Kiểm tra tính khả dụng";
$_LANG['domaincontactinfo'] = "Thông tin liên hệ";
$_LANG['domaincurrentrenewaldate'] = "Ngày gia hạn";
$_LANG['domaindnsaddress'] = "Địa chỉ";
$_LANG['domaindnshostname'] = "Host";
$_LANG['domaindnsmanagement'] = "Quản lý DNS";
$_LANG['domaindnsmanagementdesc'] = "-  Nếu loại Record là: A thì Address phải là địa chỉ IP, ví dụ: 209.85.5.35<br/>-  Nếu loại Record là: CNAME thì Address phải là tên miền , ví dụ: abc.com<br/>-  Nếu loại Record là: NS thì Address phải là tên miền , ví dụ: abc.com<br/>-  Nếu loại Record là: MX thì Host record phải là @ và Address phải là tên mail server, ví dụ: mail.abc.com<br/>-  Nếu loại Record là: URL Redirect/URL Frame thì Address phải là tên, ví dụ: http://www.abc.com";
$_LANG['domaindnsrecordtype'] = "Loại";
$_LANG['domainemailforwarding'] = "Chuyển tiếp Email";
$_LANG['domainemailforwardingdesc'] = "If the Email Forwarding Server determines the Forward To address is invalid, we will disable the forwarding record automatically. Please check the Forward To address before you enable it again. The changes on any existing forwarding record may not take effect for up to 1 hour.";
$_LANG['domainemailforwardingforwardto'] = "Chuyển đến";
$_LANG['domainemailforwardingprefix'] = "Tiền tố";
$_LANG['domaineppcode'] = "Mã EPP";
$_LANG['domaineppcodedesc'] = "This needs to be obtained from the current registrar for authorisation";
$_LANG['domaineppcoderequired'] = "You must enter the EPP code for";
$_LANG['domainerror'] = "There was a problem connecting to the domain registry. Please try again later.";
$_LANG['domainerrornodomain'] = "Tên miền đã nhập chưa chính xác";
$_LANG['domainerrortoolong'] = "The domain you entered is too long. Domains can only be up to 67 characters in length.";
$_LANG['domaingeteppcode'] = "Lấy mã EPP";
$_LANG['domaingeteppcodeemailconfirmation'] = "The EPP Code request was successful! It has been sent to the registrant email address for your domain.";
$_LANG['domaingeteppcodeexplanation'] = "The EPP Code is basically a password for a domain name. It is a security measure, ensuring that only the domain name owner can transfer a domain name. You will need it if you are wanting to transfer the domain to another registrar.";
$_LANG['domaingeteppcodefailure'] = "There was an error in requesting the EPP Code:";
$_LANG['domaingeteppcodeis'] = "Mã EPP tên miền của quý khách là:";
$_LANG['domainidprotection'] = "ID Protection";
$_LANG['domainintrotext'] = "Enter the domain and tld you wish to use in the boxes below and click Lookup to see whether the domain is available for purchase.";
$_LANG['domainlookupbutton'] = "Tra cứu";
$_LANG['domainmanagementtools'] = "Công cụ quản lý";
$_LANG['domainminyears'] = "Đăng ký tối thiểu (năm)";
$_LANG['domainmoreinfo'] = "Xem thêm";
$_LANG['domainname'] = "Tên miền";
$_LANG['domainnameserver1'] = "Nameserver 1";
$_LANG['domainnameserver2'] = "Nameserver 2";
$_LANG['domainnameserver3'] = "Nameserver 3";
$_LANG['domainnameserver4'] = "Nameserver 4";
$_LANG['domainnameserver5'] = "Nameserver 5";
$_LANG['domainnameservers'] = "Nameservers";
$_LANG['domainordernow'] = "Đăng ký ngay!";
$_LANG['domainorderrenew'] = "Order Renewal";
$_LANG['domainprice'] = "Giá";
$_LANG['domainregisterns'] = "Đăng ký Nameservers riêng";
$_LANG['domainregisternscurrentip'] = "Địa chỉ IP hiện tại";
$_LANG['domainregisternsdel'] = "Xóa một NameServer";
$_LANG['domainregisternsdelsuccess'] = "Nameserver đã được xóa thành công";
$_LANG['domainregisternsexplanation'] = "Quý khách có thể tạo và quản lý Nameserver riêng theo tên miền (ví dụ: NS1.yourdomain.com, NS2.yourdomain.com...).";
$_LANG['domainregisternsip'] = "Địa chỉ IP";
$_LANG['domainregisternsmod'] = "Sửa Nameserver IP";
$_LANG['domainregisternsmodsuccess'] = "Nameserver đã được sửa thành công";
$_LANG['domainregisternsnewip'] = "Địa chỉ IP mới";
$_LANG['domainregisternsns'] = "Nameserver";
$_LANG['domainregisternsreg'] = "Đăng ký một Nameserver riêng";
$_LANG['domainregisternsregsuccess'] = "Nameserver đã được đăng ký thành công";
$_LANG['domainregistrantchoose'] = "Lựa chọn thông tin liên hệ bạn muốn sử dụng";
$_LANG['domainregistrantinfo'] = "Thông tin đăng ký tên miền";
$_LANG['domainregistrarlock'] = "Registrar Lock";
$_LANG['domainregistrarlockdesc'] = "Kích hoạt Registrar lock (khuyên dùng). Bảo vệ tên miền của bạn khỏi việc chuyển tên miền ngoài ý muốn.";
$_LANG['domainregistration'] = "Đăng ký tên miền";
$_LANG['domainregistryinfo'] = "Thông tin đăng ký tên miền";
$_LANG['domainregnotavailable'] = "N/A";
$_LANG['domainrenew'] = "Gia hạn tên miền";
$_LANG['domainrenewal'] = "Gia hạn tên miền";
$_LANG['domainrenewalprice'] = "Gia hạn";
$_LANG['domainrenewdesc'] = "Chọn số năm cần gia hạn và bấm nút đăng ký ngay để gia hạn tên miền của bạn. ";
$_LANG['domainsautorenew'] = "Tự động gia hạn";
$_LANG['domainsautorenewdisable'] = "Tắt tự động gia hạn";
$_LANG['domainsautorenewdisabled'] = "Chưa kích hoạt";
$_LANG['domainsautorenewdisabledwarning'] = "WARNING! This domain has auto renewal disabled.<br />It will therefore expire and become inactive at the end of the current term unless manually renewed.";
$_LANG['domainsautorenewenable'] = "Kích hoạt tự động gia hạn";
$_LANG['domainsautorenewenabled'] = "Đang kích hoạt";
$_LANG['domainsautorenewstatus'] = "Tình trạng hiện tại";
$_LANG['domainsimplesearch'] = "Simple Domain Search";
$_LANG['domainspricing'] = "Giá tên miền";
$_LANG['domainsregister'] = "Đăng ký";
$_LANG['domainsrenew'] = "Gia hạn tên miền";
$_LANG['domainsrenewnow'] = "Gia hạn ngay";
$_LANG['domainstatus'] = "Tình trạng";
$_LANG['domainstransfer'] = "Chuyển tên miền";
$_LANG['domaintitle'] = "Kiểm tra tên miền";
$_LANG['domaintld'] = "TLD";
$_LANG['domaintransfer'] = "Chuyển tên miền";
$_LANG['domainunavailable'] = "Không có sẵn";
$_LANG['domainunavailable1'] = "Rất tiếc!";
$_LANG['domainunavailable2'] = "đã được đăng ký!";
$_LANG['domainviewwhois'] = "Xem báo cáo Whois";
$_LANG['downloaddescription'] = "Mô tả";
$_LANG['downloadloginrequired'] = "Truy cập bị từ chối - Bạn cần đăng nhập để tải tài nguyên này";
$_LANG['downloadname'] = "Download";
$_LANG['downloadpurchaserequired'] = "Truy cập bị từ chối";
$_LANG['downloadscategories'] = "Danh mục";
$_LANG['downloadsdescription'] = "Xem thư viện tài nguyên của chúng tôi";
$_LANG['downloadsfiles'] = "File";
$_LANG['downloadsfilesize'] = "Dung lượng";
$_LANG['downloadsintrotext'] = "The download library has all the manuals, programs and other files that you may need to get your website up and running.";
$_LANG['downloadspopular'] = "Tài nguyên tải nhiều";
$_LANG['downloadsnone'] = "Không có tài nguyên nào";
$_LANG['downloadstitle'] = "Tài nguyên";
$_LANG['email'] = "Email";
$_LANG['emptycart'] = "Xóa";
$_LANG['existingpassword'] = "Mật khẩu hiện tại";
$_LANG['existingpasswordincorrect'] = "Mật khẩu hiện tại không chính xác";
$_LANG['firstpaymentamount'] = "Thanh toán lần đầu";
$_LANG['flashtutorials'] = "Flash Tutorials";
$_LANG['flashtutorialsdescription'] = "Click here to view tutorials showing you how to use your hosting control panel";
$_LANG['flashtutorialsheadertext'] = "Our Flash Tutorials are here to help you fully utilise your web hosting control panel. Choose a task from below to see a step by step tutorial on how to complete it.";
$_LANG['forwardingtogateway'] = "Please wait while you are redirected to the gateway you chose to make payment...";
$_LANG['globalsystemname'] = "Home";
$_LANG['globalyouarehere'] = "Bạn đang ở";
$_LANG['go'] = "Chọn";
$_LANG['headertext'] = "Hệ thống hỗ trợ khách hàng.";
$_LANG['hometitle'] = "Home";
$_LANG['imagecheck'] = "Xin vui lòng nhập các ký tự mà bạn nhìn thấy trong hình dưới đây.";
$_LANG['invoiceaddcreditamount'] = "Nếu số dư tài khoản không đủ, Quý khách có thể <a target='_blank' href='/naptien'>bấm vào đây để nạp tiền</a> <br>Vui lòng nhập số tiền muốn thanh toán cho hoá đơn này:";
$_LANG['invoiceaddcreditapply'] = "Thanh toán ngay";
$_LANG['invoiceaddcreditdesc1'] = "Số dư đang có";
$_LANG['invoiceaddcreditdesc2'] = "Quý khách có thể sử dụng để thanh toán hóa đơn này.";
$_LANG['invoiceaddcreditoverbalance'] = "Số dư tài khoản trả trước của quý khách không đủ để thực hiện giao dịch này";
$_LANG['invoiceaddcreditovercredit'] = "Số dư tài khoản trả trước của quý khách không đủ để thực hiện giao dịch này";
$_LANG['invoicenumber'] = "Hóa đơn số #";
$_LANG['invoiceofflinepaid'] = "Thanh toán bằng thẻ tín dụng ngoại tuyến được xử lý thủ công.<br />Bạn sẽ nhận được xác nhận qua email sau khi thanh toán của bạn đã được xử lý.";
$_LANG['invoicerefnum'] = "Số Hóa Đơn";
$_LANG['invoices'] = "Quản lý hóa đơn";
$_LANG['invoicesamount'] = "Thành tiền";
$_LANG['invoicesattn'] = "ATTN";
$_LANG['invoicesbacktoclientarea'] = "&laquo; Quay lại trang khách hàng";
$_LANG['invoicesbalance'] = "Số dư";
$_LANG['invoicesbefore'] = "trước";
$_LANG['invoicescancelled'] = "Đã hủy";
$_LANG['invoicescollections'] = "Collections";
$_LANG['invoicescredit'] = "Tài khoản trả trước";
$_LANG['invoicesdatecreated'] = "Ngày tạo hóa đơn";
$_LANG['invoicesdatedue'] = "Hạn thanh toán";
$_LANG['invoicesdescription'] = "Mô tả chi tiết";
$_LANG['invoicesdownload'] = "Tải về";
$_LANG['invoiceserror'] = "Có lỗi xảy ra. Vui lòng thử lại";
$_LANG['invoicesinvoicedto'] = "Thông tin khách hàng";
$_LANG['invoicesinvoicenotes'] = "Ghi chú";
$_LANG['invoicesnoinvoices'] = "Không có hóa đơn";
$_LANG['invoicesnotes'] = "Ghi chú";
$_LANG['invoicesoutstandinginvoices'] = "Hóa đơn quá hạn";
$_LANG['invoicespaid'] = "Đã thanh toán";
$_LANG['invoicespaynow'] = "Thanh toán ngay";
$_LANG['invoicespayto'] = "Nhà cung cấp dịch vụ";
$_LANG['invoicesrefunded'] = "Đã hòan tiền";
$_LANG['invoicesstatus'] = "Tình trạng";
$_LANG['invoicessubtotal'] = "Tổng tiền dịch vụ";
$_LANG['invoicestax'] = "Tax Due";
$_LANG['invoicestaxindicator'] = "Dịch vụ tính thuế.";
$_LANG['invoicestitle'] = "Hóa đơn số #";
$_LANG['invoicestotal'] = "Tổng tiền thanh toán";
$_LANG['invoicestransactions'] = "Giao dịch";
$_LANG['invoicestransamount'] = "Thành tiền";
$_LANG['invoicestransdate'] = "Ngày giao dịch";
$_LANG['invoicestransgateway'] = "Cổng thanh toán";
$_LANG['invoicestransid'] = "Mã giao dịch";
$_LANG['invoicestransnonefound'] = "Không có giao dịch nào";
$_LANG['invoicesunpaid'] = "Chưa thanh toán";
$_LANG['invoicesview'] = "Xem chi tiết";
$_LANG['jobtitle'] = "Chức vụ";
$_LANG['kbsuggestions'] = "Gợi ý câu hỏi thường gặp";
$_LANG['kbsuggestionsexplanation'] = "Các bài viết sau đây được tìm thấy trong cơ sở kiến thức có thể trả lời câu hỏi của bạn. Vui lòng xem xét các đề xuất trước khi gửi.";
$_LANG['knowledgebasearticles'] = "Câu hỏi thường gặp";
$_LANG['knowledgebasecategories'] = "Danh mục";
$_LANG['knowledgebasedescription'] = "Duyệt qua KB của chúng tôi để tìm câu trả lời cho Câu hỏi thường gặp";
$_LANG['knowledgebasefavorites'] = "Thêm vào ưa thích";
$_LANG['knowledgebasehelpful'] = "Câu trả lời có hữu ích với bạn?";
$_LANG['knowledgebaseintrotext'] = "Các kiến thức cơ bản được tổ chức thành các loại khác nhau. Chọn một danh mục từ bên dưới hoặc tìm kiếm cơ sở kiến thức để tìm câu trả lời cho câu hỏi của bạn.";
$_LANG['knowledgebasemore'] = "Xem thêm";
$_LANG['knowledgebaseno'] = "Không";
$_LANG['knowledgebasenoarticles'] = "Không có câu hỏi nào";
$_LANG['knowledgebasenorelated'] = "Không có bài viết liên quan";
$_LANG['knowledgebasepopular'] = "Câu hỏi thường gặp";
$_LANG['knowledgebaseprint'] = "In bài viết này";
$_LANG['knowledgebaserating'] = "Đánh giá ";
$_LANG['knowledgebaseratingtext'] = "khách hàng đã đánh giá bài viết này hữu ích";
$_LANG['knowledgebaserelated'] = "Bài viết liên quan";
$_LANG['knowledgebasesearch'] = "Tìm kiếm";
$_LANG['knowledgebasetitle'] = "Thắc mắc";
$_LANG['knowledgebaseviews'] = "Lượt xem";
$_LANG['knowledgebasevote'] = "Bình chọn";
$_LANG['knowledgebasevotes'] = "lượt bình chọn";
$_LANG['knowledgebaseyes'] = "Có";
$_LANG['knowledgebaseArticleRatingThanks'] = "Cám ơn bạn đã bỏ thời gian đánh giá";
$_LANG['language'] = "Ngôn ngữ";
$_LANG['latefee'] = "Phí chậm thanh toán";
$_LANG['latefeeadded'] = "Đã thêm";
$_LANG['latestannouncements'] = "Thông báo mới nhất";
$_LANG['loginbutton'] = "Đăng nhập";
$_LANG['orderForm']['errorNoProducts'] = "Không có sản phẩm dịch vụ nào cho mục này";
$_LANG['loginemail'] = "Địa chỉ Email";
$_LANG['loginforgotten'] = "Quên mật khẩu?";
$_LANG['loginforgotteninstructions'] = "Yêu cầu lấy lại mật khẩu";
$_LANG['loginincorrect'] = "Thông tin đăng nhập chưa chính xác. Vui lòng thử lại.";
$_LANG['loginintrotext'] = "Bạn cần đăng nhập để truy cập trang này.";
$_LANG['loginpassword'] = "Mật khẩu";
$_LANG['loginrememberme'] = "Ghi nhớ đăng nhập";
$_LANG['logoutcontinuetext'] = "Bấm vào đây để tiếp tục ...";
$_LANG['logoutsuccessful'] = "Quý khách đã đăng xuất khỏi hệ thống.";
$_LANG['logouttitle'] = "Đăng xuất";
$_LANG['maxmind_anonproxy'] = "We do not allow orders to be placed using an Anonymous Proxy";
$_LANG['maxmind_callingnow'] = "We are placing an automated call to your phone number now. This is part of our fraud checking measures. You will be given a 4 digit security code which you need to enter below to complete your order.";
$_LANG['maxmind_countrymismatch'] = "The country of your IP address did not match the billing address country you entered so we cannot accept your order";
$_LANG['maxmind_error'] = "Error";
$_LANG['maxmind_faileddescription'] = "Mã bạn nhập không chính xác. Nếu bạn cảm thấy đây là lỗi, vui lòng liên hệ với bộ phận hỗ trợ của chúng tôi càng sớm càng tốt.";
$_LANG['maxmind_highfraudriskscore'] = "Đơn vị cài đặt cờ của bạn đã được gắn cờ có nguy cơ gây rủi ro cao và nó đã bị giữ lại để xem thử thủ công.<br /><br />Nếu bạn cảm thấy mình nhận được thông báo này, điều này đã nhầm lẫn chung, vui lòng chấp nhận lời xin lỗi của chúng tôi và <a href=\" submitticket.php\">gửi phiếu hỗ trợ</a> tới Nhóm dịch vụ khách hàng của chúng tôi. Cảm ơn.";
$_LANG['maxmind_highriskcountry'] = "Thực sự là không thể, chúng tôi không thể chấp nhận đơn đặt hàng của bạn vì đã có rất nhiều hoạt động nan giải từ gia đình quốc gia của bạn. Nếu bạn muốn sắp xếp một phương tiện thanh toán thay thế, vui lòng liên hệ với chúng tôi.";
$_LANG['maxmind_incorrectcode'] = "Mã không chính xác";
$_LANG['maxmind_pincode'] = "Mã Pin";
$_LANG['maxmind_rejectemail'] = "Chúng tôi không cho phép đặt hàng bằng địa chỉ email miễn phí, vui lòng thử lại bằng địa chỉ email khác";
$_LANG['maxmind_title'] = "MaxMind";
$_LANG['more'] = "Thêm";
$_LANG['morechoices'] = "Xem thêm";
$_LANG['networkissuesaffecting'] = "Affecting";
$_LANG['networkissuesaffectingyourservers'] = "Xin lưu ý: Các vấn đề ảnh hưởng đến máy chủ mà bạn có tài khoản sẽ được đánh dấu nền vàng";
$_LANG['networkissuesdate'] = "Ngày";
$_LANG['networkissuesdescription'] = "Read about current and scheduled network outages";
$_LANG['networkissueslastupdated'] = "Last Updated";
$_LANG['networkissuesnonefound'] = "No network issues found";
$_LANG['networkissuespriority'] = "Mức độ ưu tiên";
$_LANG['networkissuesprioritycritical'] = "Khẩn cấp";
$_LANG['networkissuespriorityhigh'] = "Cao";
$_LANG['networkissuesprioritylow'] = "Thấp";
$_LANG['networkissuesprioritymedium'] = "Bình thường";
$_LANG['networkissuesstatusinprogress'] = "Đang xử lý";
$_LANG['networkissuesstatusinvestigating'] = "Đang khảo sát";
$_LANG['networkissuesstatusopen'] = "Open";
$_LANG['networkissuesstatusoutage'] = "Outage";
$_LANG['networkissuesstatusreported'] = "Reported";
$_LANG['networkissuesstatusresolved'] = "Resolved";
$_LANG['networkissuesstatusscheduled'] = "Scheduled";
$_LANG['networkissuestitle'] = "Vấn đề mạng";
$_LANG['networkissuestypeother'] = "Khác";
$_LANG['networkissuestypeserver'] = "Máy Chủ";
$_LANG['networkissuestypesystem'] = "Hệ Thống";
$_LANG['newpassword'] = "Mật khẩu mới";
$_LANG['nextpage'] = "Trang tiếp";
$_LANG['no'] = "Không";
$_LANG['nocarddetails'] = "Không có thẻ chi tiết nào trong hồ sơ";
$_LANG['none'] = "Không";
$_LANG['norecordsfound'] = "Không có dữ liệu";
$_LANG['or'] = "hoặc";
$_LANG['orderadditionalrequiredinfo'] = "Thông tin bổ sung bắt buộc";
$_LANG['orderaddon'] = "Dịch vụ bổ sung";
$_LANG['orderaddondescription'] = "Danh sách các dịch vụ bổ sung phù hợp với dịch vụ của quý khách đã chọn.";
$_LANG['orderavailable'] = "Đang có sẵn";
$_LANG['orderavailableaddons'] = "Bấm vào đây để xem các dịch vụ bổ sung phù hợp";
$_LANG['orderbillingcycle'] = "Kỳ hạn thanh toán";
$_LANG['ordercategories'] = "Danh sách dịch vụ";
$_LANG['orderchangeaddons'] = "Thay đổi dịch vụ bổ sung";
$_LANG['orderchangeconfig'] = "Thay đổi cấu hình dịch vụ";
$_LANG['orderchangedomain'] = "Thay đổi tên miền";
$_LANG['orderchangenameservers'] = "Chỉ thay đổi Nameservers";
$_LANG['orderchangeproduct'] = "Thay đổi dịch vụ";
$_LANG['ordercheckout'] = "Thanh toán";
$_LANG['orderchooseaddons'] = "Lựa chọn dịch vụ bổ sung";
$_LANG['orderchooseapackage'] = "Lựa chọn gói dịch vụ";
$_LANG['ordercodenotfound'] = "Mã giảm giá không đúng. Vui lòng kiểm tra lại";
$_LANG['ordercompletebutnotpaid'] = "Chú ý! Đơn hàng của bạn đã hoàn tất nhưng bạn chưa thanh toán nên đơn hàng sẽ không được kích hoạt.<br />Click vào liên kết bên dưới để đến hóa đơn thanh toán.";
$_LANG['orderconfigpackage'] = "Tuỳ chọn cấu hình dịch vụ";
$_LANG['orderconfigure'] = "Thiết lập";
$_LANG['orderconfirmation'] = "Xác nhận đơn đặt hàng";
$_LANG['orderconfirmorder'] = "Xác nhận";
$_LANG['ordercontinuebutton'] = "Tiếp tục >>";
$_LANG['orderdesc'] = "Mô tả";
$_LANG['orderdescription'] = "Đăng ký dịch vụ ngay hôm nay";
$_LANG['orderdiscount'] = "Giảm giá";
$_LANG['orderdomain'] = "Tên miền";
$_LANG['orderdomainoption1part1'] = "Tôi muốn";
$_LANG['orderdomainoption1part2'] = "đăng ký tên miền mới cho tôi.";
$_LANG['orderdomainoption2'] = "Tôi đã có tên miền và sẽ cập nhật DNS.";
$_LANG['orderdomainoption3'] = "Tôi muốn chuyển tên miền về";
$_LANG['orderdomainoption4'] = "Tôi muốn sử dụng subdomain miễn phí.";
$_LANG['orderdomainoptions'] = "Chọn tên miền";
$_LANG['orderdomainregistration'] = "Đăng ký tên miền";
$_LANG['orderdomainregonly'] = "Đăng ký tên miền";
$_LANG['orderdomaintransfer'] = "Chuyển nhà đăng ký";
$_LANG['orderdontusepromo'] = "Không sử dụng mã giảm giá";
$_LANG['ordererroraccepttos'] = "Quý khách cần đồng ý quy định sử dụng dịch vụ của chúng tôi.";
$_LANG['ordererrordomainalreadyexists'] = "The domain you entered is already registered with us - you will need to cancel it prior to placing a new order";
$_LANG['ordererrordomaininvalid'] = "Tên miền bạn đã nhập chưa chính xác";
$_LANG['ordererrordomainnotld'] = "Quý khách cần điền phần mở rộng của tên miền";
$_LANG['ordererrordomainnotregistered'] = "Quý khách không thể chuyển một tên miền chưa đăng ký";
$_LANG['ordererrordomainregistered'] = "Tên miền bạn nhập đã được đăng ký";
$_LANG['ordererrornameserver1'] = "Quý khách cần điền nameserver 1";
$_LANG['ordererrornameserver2'] = "Quý khách cần điền nameserver 2";
$_LANG['ordererrornodomain'] = "Quý khách cần điền tên miền";
$_LANG['ordererrorpassword'] = "Quý khách cần điền mật khẩu";
$_LANG['ordererrorserverhostnameinuse'] = "Hostname bạn vừa nhập đã tồn tại. Vui lòng kiểm tra lại.";
$_LANG['ordererrorservernohostname'] = "Quý khách cần điền hostname cho server đang đăng ký";
$_LANG['ordererrorservernonameservers'] = "Quý khách cần điền một prefix cho cả 2  nameservers";
$_LANG['ordererrorservernorootpw'] = "Quý khách cần điền mật khẩu root cho server đang đăng ký";
$_LANG['ordererrorsubdomaintaken'] = "Subdomain bạn điền đã được sử dụng. Vui lòng kiểm tra lại";
$_LANG['ordererrortransfersecret'] = "Quý khách cần điền mã EPP để chuyển tên miền";
$_LANG['ordererroruserexists'] = "Địa chỉ Email đã được sử dụng. Vui lòng kiểm tra lại";
$_LANG['orderexistinguser'] = "Tôi đã có tài khoản và muốn thêm đơn đặt hàng này vào tài khoản của tôi";
$_LANG['orderfailed'] = "Đặt hàng không thành công!";
$_LANG['orderfinalinstructions'] = "Nếu quý khách có bất kỳ câu hỏi hay thắc mắc nào cần giải đáp, xin hãy liên hệ với chúng tôi.";
$_LANG['orderfree'] = "Miễn phí!";
$_LANG['orderfreedomainappliesto'] = "applies to the following extensions only";
$_LANG['orderfreedomaindescription'] = "on selected payment terms";
$_LANG['orderfreedomainonly'] = "Miễn phí tên miền";
$_LANG['orderfreedomainregistration'] = "Miễn phí đăng ký tên miền";
$_LANG['ordergotoclientarea'] = "Bấm vào đây để quay lại trang khách hàng";
$_LANG['orderinvalidcodeforbillingcycle'] = "Mã này không áp dụng cho kỳ hạn thanh toán đã chọn";
$_LANG['orderlogininfo'] = "Thông tin đăng nhập";
$_LANG['orderlogininfopart1'] = "Please enter the password that you wish to use to login to your";
$_LANG['orderlogininfopart2'] = "Client Area. This will differ from your website control panel username &amp; password.";
$_LANG['ordernewuser'] = "Tôi là khách hàng mới & chưa có tài khoản";
$_LANG['ordernoproducts'] = "Không tìm thấy sản phẩm, dịch vụ nào";
$_LANG['ordernotes'] = "Ghi chú / Thông tin thêm";
$_LANG['ordernotesdescription'] = "Quý khách có thể điền thêm thông tin / yêu cầu về dịch vụ đang đăng ký cho chúng tôi...";
$_LANG['ordernowbutton'] = "Đăng ký ngay";
$_LANG['ordernumberis'] = "Đơn đặt hàng số #";
$_LANG['orderpaymentmethod'] = "Hình thức thanh toán";
$_LANG['orderpaymentterm12month'] = "12 tháng";
$_LANG['orderpaymentterm1month'] = "1 tháng";
$_LANG['orderpaymentterm24month'] = "24 tháng";
$_LANG['orderpaymentterm3month'] = "3 tháng";
$_LANG['orderpaymentterm6month'] = "6 tháng";
$_LANG['orderpaymenttermannually'] = "1 năm";
$_LANG['orderpaymenttermbiennially'] = "2 năm";
$_LANG['orderpaymenttermfreeaccount'] = "Miễn phí";
$_LANG['orderpaymenttermmonthly'] = "1 tháng";
$_LANG['orderpaymenttermOnetime'] = "Thanh toán 1 lần";
$_LANG['orderpaymenttermquarterly'] = "3 tháng";
$_LANG['orderpaymenttermsemiannually'] = "6 tháng";
$_LANG['orderprice'] = "Giá";
$_LANG['orderproduct'] = "Sản phẩm / Dịch vụ";
$_LANG['orderprogress'] = "Đang xử lý";
$_LANG['orderpromoexpired'] = "Mã giảm giá đã hết hạn";
$_LANG['orderpromoinvalid'] = "Mã giảm giá không khả dụng với các sản phẩm / dịch vụ đang đăng ký";
$_LANG['orderpromomaxusesreached'] = "Mã giảm giá đã được sử dụng";
$_LANG['orderpromotioncode'] = "Mã giảm giá";
$_LANG['orderpromovalidatebutton'] = "Áp dụng";
$_LANG['orderPromoCodePlaceholder'] = "Nhập mã giảm giá dịch vụ (nếu có)";
$_LANG['orderprorata'] = "Pro Rata";
$_LANG['orderreceived'] = "Cám ơn quý khách đã đăng ký sử dụng dịch vụ tại $tenweb. Thông tin xác nhận đơn đặt hàng sẽ được gửi đến email của quý khách.";
$_LANG['orderregisterdomain'] = "Đăng ký tên miền";
$_LANG['orderregperiod'] = "Thời gian đăng ký";
$_LANG['ordersecure'] = "Để đảm bảo tính hợp pháp của đơn hàng này, địa chỉ IP của quý khách";
$_LANG['ordersecure2'] = "sẽ được hệ thống lưu lại.";
$_LANG['orderserverhostname'] = "Server Hostname";
$_LANG['orderservernameservers'] = "Nameservers";
$_LANG['orderservernameserversdescription'] = "Tiền tố bạn nhập vào đây sẽ xác định mặc định tên máy chủ cho máy chủ, vd. ns1.yourdomain.com và ns2.yourdomain.com";
$_LANG['orderservernameserversprefix1'] = "Prefix 1";
$_LANG['orderservernameserversprefix2'] = "Prefix 2";
$_LANG['orderserverrootpassword'] = "Mật khẩu Máy Chủ/VPS";
$_LANG['ordersetupfee'] = "Phí cài đặt";
$_LANG['orderstartover'] = "Đăng ký lại từ đầu";
$_LANG['ordersubdomaininuse'] = "Subdomain đã được sử dụng";
$_LANG['ordersubtotal'] = "Tổng tiền dịch vụ";
$_LANG['ordersummary'] = "Thông tin đơn hàng";
$_LANG['ordertaxcalculations'] = "Tax Calculations";
$_LANG['ordertaxstaterequired'] = "Quý khách cần chọn khu vực để áp dụng thuế tương ứng";
$_LANG['ordertitle'] = "Đặt hàng";
$_LANG['ordertos'] = "Quy định sử dụng dịch vụ";
$_LANG['ordertosagreement'] = "Tôi đã đọc và đồng ý với";
$_LANG['ordertotalduetoday'] = "Cộng tiền thanh toán";
$_LANG['ordertotalrecurring'] = "Số tiền thanh toán định kỳ";
$_LANG['ordertransferdomain'] = "Transfer an Existing Domain Name";
$_LANG['ordertransfersecret'] = "Transfer Secret";
$_LANG['ordertransfersecretexplanation'] = "Vui lòng nhập Domain Transfer Secret có thể lấy từ nhà đăng ký tên miền trước đó của bạn.";
$_LANG['orderusesubdomain'] = "Sử dụng Subdomain";
$_LANG['orderyears'] = "năm";
$_LANG['orderyourinformation'] = "Thông tin của bạn";
$_LANG['orderyourorder'] = "Đơn đặt hàng của bạn";
$_LANG['organizationname'] = "Tên tổ chức / công ty";
$_LANG['outofstock'] = "Hết hàng";
$_LANG['outofstockdescription'] = "Chúng tôi hiện đã hết hàng mặt hàng này nên các đơn đặt hàng cho nó đã tạm dừng cho đến khi có thêm hàng. Để biết thêm thông tin xin vui lòng liên hệ với chúng tôi.";
$_LANG['page'] = "Trang";
$_LANG['pageof'] = "của";
$_LANG['please'] = "Vui lòng";
$_LANG['pleasewait'] = "Vui lòng chờ trong giây lát ...";
$_LANG['presalescontactdescription'] = "Đặt bất kỳ yêu cầu nào trước khi bán hàng ở đây";
$_LANG['previouspage'] = "Trang trước";
$_LANG['proformainvoicenumber'] = "Proforma Invoice #";
$_LANG['promoexistingclient'] = "Bạn phải có sản phẩm/dịch vụ đang hoạt động để sử dụng mã giảm giá này";
$_LANG['promoonceperclient'] = "Mã này chỉ có thể được sử dụng một lần cho mỗi khách hàng";
$_LANG['pwstrengthfail'] = "Mật khẩu bạn đã nhập không đủ mạnh - vui lòng nhập mật khẩu phức tạp hơn";
$_LANG['quicknav'] = "Điều hướng nhanh";
$_LANG['recordsfound'] = "bản ghi";
$_LANG['recurring'] = "Định kỳ";
$_LANG['recurringamount'] = "Số tiền thanh toán định kỳ";
$_LANG['every'] = "mỗi";
$_LANG['registerdomain'] = "Đăng ký tên miền";
$_LANG['registerdomaindesc'] = "Vui lòng nhập tên miền quý khách muốn đăng ký vào ô dưới đây.";
$_LANG['registerdomainname'] = "Đăng ký tên miền";
$_LANG['relatedservice'] = "Dịch vụ liên quan";
$_LANG['rssfeed'] = "Feed";
$_LANG['securityanswerrequired'] = "Quý khách cần điền câu hỏi bí mật";
$_LANG['securitybothnotmatch'] = "Câu trả lời của quý khách chưa chính xác";
$_LANG['securitycurrentincorrect'] = "Câu hỏi & câu trả lời của quý khách chưa chính xác";
$_LANG['serverchangepassword'] = "Thay đổi mật khẩu";
$_LANG['serverchangepasswordintro'] = "Quý khách có thể thay đổi mật khẩu tài khoản dịch vụ (hosting/server/domain) theo mẫu dưới đây. (lưu ý: tài khoản dịch vụ khác với tài khoản quản lý khách hàng)";
$_LANG['serverchangepasswordconfirm'] = "Xác nhận lại mật khẩu";
$_LANG['serverchangepasswordenter'] = "Mật khẩu mới";
$_LANG['serverchangepasswordfailed'] = "Thay đổi mật khẩu không thành công!";
$_LANG['serverchangepasswordsuccessful'] = "Thay đổi mật khẩu thành công!";
$_LANG['serverchangepasswordupdate'] = "Cập nhật";
$_LANG['serverhostname'] = "Hostname";
$_LANG['serverlogindetails'] = "Thông tin đăng nhập";
$_LANG['servername'] = "Server";
$_LANG['serverns1prefix'] = "NS1 Prefix";
$_LANG['serverns2prefix'] = "NS2 Prefix";
$_LANG['serverpassword'] = "Mật khẩu";
$_LANG['serverrootpw'] = "Mật khẩu Root";
$_LANG['serverstatusdescription'] = "Xem thông tin trạng thái trực tiếp cho các máy chủ của chúng tôi";
$_LANG['serverstatusnoservers'] = "Không có máy chủ hiện đang được giám sát";
$_LANG['serverstatusnotavailable'] = "Không khả dụng";
$_LANG['serverstatusoffline'] = "Ngoại Tuyến";
$_LANG['serverstatusonline'] = "Trực Tuyến";
$_LANG['serverstatusphpinfo'] = "Thông tin PHP";
$_LANG['serverstatusserverload'] = "Server Load";
$_LANG['serverstatustitle'] = "Networks";
$_LANG['serverstatusuptime'] = "Uptime";
$_LANG['serverusername'] = "Username";
$_LANG['show'] = "Hiển thị";
$_LANG['ssladmininfo'] = "Thông tin quản trị viên";
$_LANG['ssladmininfodetails'] = "Thông tin dưới đây sẽ không hiển thị trên chứng chỉ mà chỉ nhằm mục đích quản lý thông tin & nhận thông báo về đơn hàng.";
$_LANG['sslcertapproveremail'] = "Email xác nhận";
$_LANG['sslcertapproveremaildetails'] = "Quý khách cần chọn một trong các tùy chọn Email dưới đây để nhận Email xác thực chứng chỉ SSL. Hãy chắc chắn rằng địa chỉ email tồn tại và thiết lập đúng trước khi gửi đơn đặt hàng; nếu không email sẽ không được chuyển giao. Nếu quý khách không thấy thư trong inbox, hãy kiểm tra trong mục Spam/Junk.";
$_LANG['sslcertinfo'] = "Thông tin chứng chỉ SSL";
$_LANG['pleasechooseone'] = "Vui lòng chọn loại máy chủ...";
$_LANG['sslcerttype'] = "Loại chứng chỉ";
$_LANG['sslconfigcomplete'] = "Thiết lập hoàn tất";
$_LANG['sslconfigcompletedetails'] = "Quá trình thiết lập chứng chỉ SSL đã hoàn thành. Quý khách sẽ nhận được một email xác nhận trong ít phút.";
$_LANG['sslconfsslcertificate'] = "Thiết lập chứng chỉ SSL";
$_LANG['sslcsr'] = "CSR";
$_LANG['sslerrorapproveremail'] = "Quý khách phải chọn một địa chỉ email để xác thực";
$_LANG['sslerrorentercsr'] = "Quý khách phải cung cấp mã CSR";
$_LANG['sslerrorselectserver'] = "Quý khách phải chọn loại Server";
$_LANG['sslinvalidlink'] = "Liên kết chưa chính xác. Vui lòng thử lại.";
$_LANG['sslorderdate'] = "Ngày đặt hàng";
$_LANG['sslserverinfo'] = "Thông tin máy chủ";
$_LANG['sslserverinfodetails'] = "Quý khách cần có mã \"CSR\" để kích hoạt chứng chỉ SSL. CSR là một đoạn mã được sinh ra bởi máy chủ nơi chứng chỉ SSL sẽ được cài đặt. Mỗi domain sẽ có một CSR riêng biệt nên quý khách sẽ cần làm lại bước này nếu sau này muốn xác thực cho các domain khác trên cùng serve và mỗi khi chuyển server, quý khách cũng cần tạo một CSR Key mới. Nếu quý khách không thạo về kỹ thuật, hãy liên hệ với đơn vị cung cấp hosting được hỗ trợ. ";
$_LANG['sslservertype'] = "Web Server";
$_LANG['sslstatus'] = "Tình trạng";
$_LANG['statscreditbalance'] = "Số dư tài khoản trả trước";
$_LANG['statsdueinvoicesbalance'] = "Số tiền quá hạn thanh toán";
$_LANG['statsnumdomains'] = "Số lượng tên miền";
$_LANG['statsnumproducts'] = "Số lượng dịch vụ";
$_LANG['statsnumreferredsignups'] = "Số lượng khách hàng đã giới thiệu";
$_LANG['statsnumtickets'] = "Số lượng ticket hỗ trợ";
$_LANG['submitticketdescription'] = "Gửi yêu cầu hỗ trợ";
$_LANG['supportclickheretocontact'] = "click vào đây để liên hệ với chúng tôi";
$_LANG['supportpresalesquestions'] = "Bạn có thắc mắc cần giải đáp";
$_LANG['supportticketinvalid'] = "Có lỗi xảy ra. Không tìm thấy Ticket đã yêu cầu.";
$_LANG['supportticketsallowedextensions'] = "Hỗ trợ định dạng";
$_LANG['supportticketschoosedepartment'] = "Bộ phận tiếp nhận";
$_LANG['supportticketsclient'] = "Khách hàng";
$_LANG['supportticketsclientemail'] = "Địa chỉ Email";
$_LANG['supportticketsclientname'] = "Họ & Tên";
$_LANG['supportticketsdate'] = "Ngày";
$_LANG['supportticketsdepartment'] = "Phòng ban";
$_LANG['supportticketsdescription'] = "Xem và trả lời vào ticket đã gửi";
$_LANG['supportticketserror'] = "Lỗi";
$_LANG['supportticketserrornoemail'] = "Quý khách chưa nhập địa chỉ Email";
$_LANG['supportticketserrornomessage'] = "Quý khách chưa nhập nội dung";
$_LANG['supportticketserrornoname'] = "Quý khách chưa nhập họ & tên";
$_LANG['supportticketserrornosubject'] = "Quý khách chưa nhập tiêu đề Ticket";
$_LANG['supportticketsfilenotallowed'] = "Các file đã tải lên không được chấp nhận.";
$_LANG['supportticketsheader'] = "Quý khách không tìm thấy câu trả lời tại mục câu hỏi thường gặp của chúng tôi ? Hãy gửi ticket yêu cầu hỗ trợ cho bộ phận tương ứng dưới đây để chúng tôi được phục vụ.";
$_LANG['supportticketsnotfound'] = "Không tìm thấy Ticket";
$_LANG['supportticketsopentickets'] = "Mở Ticket hỗ trợ";
$_LANG['supportticketspagetitle'] = "Hỗ trợ";
$_LANG['supportticketsposted'] = "Đã gửi";
$_LANG['supportticketsreply'] = "Trả lời";
$_LANG['supportticketsstaff'] = "Nhân viên";
$_LANG['supportticketsstatus'] = "Tình trạng";
$_LANG['supportticketsstatusanswered'] = "Đã trả lời";
$_LANG['supportticketsstatusclosed'] = "Đã đóng";
$_LANG['supportticketsstatuscloseticket'] = "Click vào đây để đóng Ticket";
$_LANG['supportticketsstatuscustomerreply'] = "Khách hàng trả lời";
$_LANG['supportticketsstatusinprogress'] = "Đang xử lý";
$_LANG['supportticketsstatusonhold'] = "Đang giữ";
$_LANG['supportticketsstatusopen'] = "Đang mở";
$_LANG['supportticketssubject'] = "Tiêu đề";
$_LANG['supportticketssubmitticket'] = "Gửi Ticket";
$_LANG['supportticketssystemdescription'] = "Hỗ trợ hệ thống vé cho phép chúng tôi phản hồi các vấn đề và thắc mắc của bạn một cách nhanh nhất. Khi chúng tôi phản hồi phiếu bầu hỗ trợ của bạn, bạn sẽ nhận được thông báo qua email.";
$_LANG['supportticketsticketattachments'] = "Đính kèm";
$_LANG['supportticketsticketcreated'] = "Ticket đã được tạo";
$_LANG['supportticketsticketcreateddesc'] = "Ticket của quý khách đã được tạo thành công. Một email kèm thông tin chi tiết sẽ được gửi đến Email của quý khách.";
$_LANG['supportticketsticketid'] = "Ticket ID";
$_LANG['supportticketsticketsubject'] = "Tiêu đề";
$_LANG['supportticketsticketsubmit'] = "Gửi";
$_LANG['supportticketsticketurgency'] = "Khẩn cấp";
$_LANG['supportticketsticketurgencyhigh'] = "Cao";
$_LANG['supportticketsticketurgencylow'] = "Thấp";
$_LANG['supportticketsticketurgencymedium'] = "Bình thường";
$_LANG['supportticketsuploadfailed'] = "Không thể tải file đính kèm";
$_LANG['supportticketsviewticket'] = "Xem Ticket";
$_LANG['supportticketclosedmsg'] = "Ticket này đang ở trạng thái đóng. Quý khách có thể trả lời để mở lại Ticket này.";
$_LANG['telesignincorrectpin'] = "Sai mã Pin!";
$_LANG['telesigninitiatephone'] = "We can't initiate phone verification for your number. Please contact us.";
$_LANG['telesigninvalidnumber'] = "Số điện thoại chưa chính xác";
$_LANG['telesigninvalidpin'] = "The PIN you entered was invalid!";
$_LANG['telesigninvalidpin2'] = "The pin you entered was not valid.";
$_LANG['telesigninvalidpinmessage'] = "Pin Code Verification Failed";
$_LANG['telesignmessage'] = "Phone verification initiated for number %s . Please wait...";
$_LANG['telesignphonecall'] = "Phone call";
$_LANG['telesignpin'] = "Enter your PIN: ";
$_LANG['telesignsms'] = "Sms";
$_LANG['telesignsmstextmessage'] = "Thank you for using our SMS verification system. Your code is: %s Please enter this code on your computer now.!";
$_LANG['telesigntitle'] = "TeleSign phone verification.";
$_LANG['telesigntype'] = "Choose verification type for number %s:";
$_LANG['telesignverificationcanceled'] = "There is a temporary problem with the phone verification service and phone verification has been canceled.";
$_LANG['telesignverificationproblem'] = "There was a problem with the phone verification service and your order could not be validated. Please try again later.";
$_LANG['telesignverify'] = "Your phone number %s needs to be verified to complete the order.";
$_LANG['ticketratingexcellent'] = "Hài lòng";
$_LANG['ticketratingpoor'] = "Không hài lòng";
$_LANG['ticketratingquestion'] = "Quý khách có hài lòng với câu trả lời này ?";
$_LANG['ticketreatinggiven'] = "Quý khách đã nhận xét câu trả lời";
$_LANG['transferdomain'] = "Chuyển tiền miền";
$_LANG['transferdomaindesc'] = "Vui lòng nhập tên miền quý khách muốn chuyển về $tenweb vào ô dưới đây.";
$_LANG['transferdomainname'] = "Chuyển tên miền";
$_LANG['updatecart'] = "Cập nhật giỏ hàng";
$_LANG['upgradechooseconfigoptions'] = "Các tùy chọn nâng cấp cho sản phẩm / dịch vụ này.";
$_LANG['upgradechoosepackage'] = "Vui lòng chọn gói dịch vụ quý khách muốn nâng cấp theo các tùy chọn dưới đây.";
$_LANG['upgradecurrentconfig'] = "Đang sử dụng";
$_LANG['upgradedowngradeconfigoptions'] = "Tùy chọn nâng cấp";
$_LANG['upgradenewconfig'] = "Gói nâng cấp khả dụng";
$_LANG['upgradenochange'] = "Không thay đổi";
$_LANG['upgradeproductlogic'] = "Chi phí nâng cấp được tính dựa trên số tiền còn lại của dịch vụ đang sử dụng. Số dư này sẽ được chuyển sang hợp đồng dịch vụ mới (nâng cấp).";
$_LANG['upgradesummary'] = "Chi tiết đơn hàng của quý khách.";
$_LANG['usedefaultcontact'] = "Sử dụng mặc định (Thông tin như trên)";
$_LANG['varilogixfraudcall_callnow'] = "Call Now!";
$_LANG['varilogixfraudcall_description'] = "Là một phần trong các biện pháp ngăn chặn gian lận của chúng tôi, giờ đây chúng tôi sẽ gọi đến số điện thoại đã đăng ký tài khoản của bạn và yêu cầu bạn nhập mã pin trên. Vui lòng ghi lại mã pin và khi bạn đã sẵn sàng để tôi thực hiện cuộc gọi, vui lòng nhấp vào nút bên dưới.";
$_LANG['varilogixfraudcall_error'] = "Đã xảy ra lỗi và chúng tôi không thể gọi số điện thoại của bạn để xác định đơn hàng. Vui lòng liên hệ bộ phận hỗ trợ của chúng tôi trong thời gian sớm nhất để hoàn thành đơn hàng.";
$_LANG['varilogixfraudcall_fail'] = "Cuộc gọi để xác định đơn hàng của bạn không thành công. Điều này có thể là do một số điện thoại của bạn đã được nhập sai hoặc được đưa vào danh sách đen trên hệ thống của chúng tôi. Vui lòng liên hệ bộ phận hỗ trợ của chúng tôi trong thời gian sớm nhất để hoàn thành đơn hàng.";
$_LANG['varilogixfraudcall_failed'] = "Failed";
$_LANG['varilogixfraudcall_pincode'] = "Mã Pin";
$_LANG['varilogixfraudcall_title'] = "VariLogix FraudCall";
$_LANG['viewcart'] = "Giỏ hàng";
$_LANG['welcomeback'] = "Hi";
$_LANG['whoisresults'] = "Kết quả WHOIS cho";
$_LANG['yes'] = "Có";
$_LANG['yourdetails'] = "Thông tin chi tiết";

# Version 4.1

$_LANG['clientareafiles'] = "File đính kèm";
$_LANG['clientareafilesdate'] = "Ngày tải lên";
$_LANG['clientareafilesfilename'] = "Tên File";

$_LANG['pwreset'] = "Lấy lại mật khẩu";
$_LANG['pwresetdesc'] = "Quý khách có thể phục hồi lại mật khẩu đã quên / bị mất bằng cách nhập địa chỉ email quý khách dùng để truy cập và trả lời câu hỏi bảo mật (nếu có), hệ thống sẽ gửi một email hướng dẫn quý khách lấy lại mật khẩu.";
$_LANG['pwresetemailrequired'] = "Vui lòng điền địa chỉ Email";
$_LANG['pwresetemailnotfound'] = "Không tim thấy tài khoản nào sử dụng địa chỉ Email bạn đã điền";
$_LANG['pwresetsecurityquestionrequired'] = "Để khôi phục lại mật khẩu, bạn cần trả lời câu hỏi dưới đây.";
$_LANG['pwresetsecurityquestionincorrect'] = "Câu trả lời chưa chính xác. Vui lòng kiểm tra lại.";
$_LANG['pwresetsubmit'] = "Gửi";
$_LANG['pwresetvalidationsent'] = "Email xác nhận đã được gửi đi";
$_LANG['pwresetvalidationcheckemail'] = "Yêu cầu lấy lại mật khẩu đã được ghi nhận. Vui lòng kiểm tra Email của bạn và làm theo hướng dẫn.";
$_LANG['pwresetkeyinvalid'] = "Liên kết khôi phục mật khẩu chưa chính xác. Vui lòng thử lại.";
$_LANG['pwresetkeyexpired'] = "Liên kết khôi phục mật khẩu đã hết hạn. Vui lòng thử lại.";
$_LANG['pwresetvalidationsuccess'] = "Lấy lại mật khẩu thành công";

$_LANG['overagescharges'] = "Overage Charge";
$_LANG['overagestotaldiskusage'] = "Dung lượng đã sử dụng";
$_LANG['overagestotalbwusage'] = "Băng thông đã sử dụng";

$_LANG['affiliatescommissionspending'] = "Số tiền trong trạng thái chờ";
$_LANG['affiliatescommissionsavailable'] = "Số tiền hoa hồng được hưởng";
$_LANG['affiliatessignups'] = "Lượt đăng ký";
$_LANG['affiliatesconversionrate'] = "Tỷ lệ";

$_LANG['configoptionqtyminmax'] = "%s có yêu cầu tối thiểu là %s và tối đa là %s";

$_LANG['creditcardnostore'] = "Tick this box if you do NOT want us to store your credit card details for recurring billing";
$_LANG['creditcarddelete'] = "Delete Saved Card Details";
$_LANG['creditcarddeleteconfirmation'] = "Chi tiết thẻ tín dụng được lưu trữ hiện đã bị xóa khỏi tài khoản của bạn";
$_LANG['creditcardupdatenotpossible'] = "Thẻ tín dụng chi tiết không thể được cập nhật vào thời điểm hiện tại. Vui lòng thử lại sau.";

$_LANG['invoicepaymentsuccessconfirmation'] = "Thanh toán của quý khách đã thực hiện thành công.";
$_LANG['invoicepaymentfailedconfirmation'] = "Thanh toán của quý khách chưa được thực hiện.<br />Vui lòng thử lại hoặc liên hệ với bộ phận hỗ trợ.";

# Version 4.2

$_LANG['promoappliedbutnodiscount'] = "Mã khuyến mãi bạn nhập đã được áp dụng cho giỏ hàng của bạn nhưng chưa có mặt hàng nào đủ điều kiện để được giảm giá - vui lòng kiểm tra các điều khoản khuyến mãi";

$_LANG['upgradeerroroverdueinvoice'] = "Hiện tại, bạn không thể nâng cấp hoặc hạ cấp sản phẩm này vì hóa đơn đã được tạo cho lần gia hạn tiếp theo.<br /><br />Để tiếp tục, trước tiên, vui lòng thanh toán hóa đơn chưa thanh toán và sau đó bạn sẽ có thể nâng cấp hoặc hạ cấp ngay sau đó và được tính khoản chênh lệch hoặc ghi có khi thích hợp.";
$_LANG['upgradeexistingupgradeinvoice'] = "Hiện tại, bạn không thể nâng cấp hoặc hạ cấp sản phẩm này vì quá trình nâng cấp hoặc hạ cấp đang được tiến hành.<br /><br />Để tiếp tục, trước tiên, vui lòng thanh toán hóa đơn chưa thanh toán và sau đó bạn sẽ có thể nâng cấp hoặc hạ cấp ngay sau đó và được tính phí chênh lệch hoặc ghi có khi thích hợp.<br/><br/>Nếu bạn cho rằng mình nhận được thông báo này là do nhầm lẫn, vui lòng liên hệ với bộ phận hỗ trợ";

$_LANG['subaccountactivate'] = "Kích hoạt tài khoản phụ";
$_LANG['subaccountactivatedesc'] = "Cho phép tài khoản phụ truy cập & quản lý dịch vụ";
$_LANG['subaccountpermissions'] = "Phân quyền tài khoản phụ";
$_LANG['subaccountpermsprofile'] = "Chỉnh sửa thông tin ";
$_LANG['subaccountpermscontacts'] = "Quản lý các thông tin liên hệ";
$_LANG['subaccountpermsproducts'] = "Quản lý các sản phẩm & dịch vụ";
$_LANG['subaccountpermsmanageproducts'] = "Quản lý tài khoản dịch vụ";
$_LANG['subaccountpermsdomains'] = "Hiển thị tên miền";
$_LANG['subaccountpermsmanagedomains'] = "Quản lý cấu hình tên miền";
$_LANG['subaccountpermsinvoices'] = "Xem & thanh toán hóa đơn";
$_LANG['subaccountpermstickets'] = "Xem & mở Ticket hỗ trợ";
$_LANG['subaccountpermsaffiliates'] = "Quản lý tài khoản cộng tác viên";
$_LANG['subaccountpermsemails'] = "Hiển thị Email";
$_LANG['subaccountpermsorders'] = "Đặt hàng / Nâng cấp / Hủy dịch vụ";
$_LANG['subaccountpermissiondenied'] = "You do not have the required permissions to access this page";
$_LANG['subaccountallowedperms'] = "Quyền của bạn được phép là:";
$_LANG['subaccountcontactmaster'] = "Vui lòng liên hệ với chính tài khoản chủ nếu bạn cảm thấy đây là lỗi.";

$_LANG['knowledgebasealsoread'] = "Bài viết liên quan";

$_LANG['orderpaymenttermtriennially'] = "3 năm";
$_LANG['orderpaymentterm36month'] = "36 tháng";

$_LANG['domainrenewals'] = "Gia hạn tên miền";
$_LANG['domaindaysuntilexpiry'] = "Ngày đến hạn";
$_LANG['domainrenewalsnoneavailable'] = "Không có tên miền nào cần gia hạn";
$_LANG['domainrenewalspastgraceperiod'] = "Không thể gia hạn";
$_LANG['domainrenewalsingraceperiod'] = "Gia hạn ngay!";
$_LANG['domainrenewalsdays'] = "ngày";
$_LANG['domainrenewalsdaysago'] = "ngày trước";

$_LANG['invoicespartialpayments'] = "Partial Payments";
$_LANG['invoicestotaldue'] = "Số tiền cần thanh toán";

$_LANG['masspaytitle'] = "Thanh toán hóa đơn";
$_LANG['masspaydescription'] = "Dưới đây là tóm tắt các hóa đơn đã chọn và tổng số tiền phải trả cho tất cả các hóa đơn đó. Để gửi thanh toán, vui lòng chỉ cần chọn phương thức thanh toán bạn muốn bên dưới rồi gửi.";
$_LANG['masspayselected'] = "Thanh toán";
$_LANG['masspayall'] = "Thanh toán";
$_LANG['masspaymakepayment'] = "Thực hiện thanh toán";

# Version 4.3

$_LANG['searchenterdomain'] = "Điền tên miền cần tìm kiếm";
$_LANG['searchfilter'] = "Lọc";

$_LANG['suspendreason'] = "Lý do tạm ngưng";
$_LANG['suspendreasonoverdue'] = "Quá hạn thanh toán";

$_LANG['vpsnetmanagement'] = "Quản lý VPS";
$_LANG['vpsnetpowermanagement'] = "Power Management";
$_LANG['poweron'] = "Bật";
$_LANG['poweroffforced'] = "Tắt";
$_LANG['powerreboot'] = "Reboot";
$_LANG['powershutdown'] = "Shutdown";
$_LANG['vpsnetcpugraphs'] = "CPU Graphs";
$_LANG['vpsnetnetworkgraphs'] = "Network Graphs";
$_LANG['vpsnethourly'] = "Hàng giờ";
$_LANG['vpsnetdaily'] = "Hàng ngày";
$_LANG['vpsnetweekly'] = "Hàng tuần";
$_LANG['vpsnetmonthly'] = "Hàng tháng";
$_LANG['view'] = "Xem";
$_LANG['vpsnetbackups'] = "Tùy chọn sao lưu";
$_LANG['vpsnetgenbackup'] = "Tạo bản sao lưu";
$_LANG['vpsnetrestorebackup'] = "Khôi phục bản lưu";
$_LANG['vpsnetrestorebackupwarning'] = "Restoring the backup will over write your VPS server";
$_LANG['vpsnetnobackups'] = "Không có bản sao lưu nào";
$_LANG['vpsnetrunning'] = "Đang chạy";
$_LANG['vpsnetnotrunning'] = "Đang tạm ngưng";
$_LANG['vpsnetpowercycling'] = "Power is cycling";
$_LANG['vpsnetcloud'] = "Cloud";
$_LANG['vpsnettemplate'] = "Template";
$_LANG['vpsnetstatus'] = "Tình trạng hệ thống";
$_LANG['vpsnetbwusage'] = "Băng thông đã sử dụng";

$_LANG['twitterlatesttweets'] = "Tweets gần đây";
$_LANG['twitterfollow'] = "Follow Us on Twitter";
$_LANG['twitterfollowus'] = "Follow us";
$_LANG['twitterfollowuswhy'] = "to stay up to date with our latest news &amp; offers";

$_LANG['chatlivehelp'] = "Live Help";

$_LANG['domainrelease'] = "Release Domain";
$_LANG['domainreleasedescription'] = "Enter a new TAG here to move your domain name to another registrar";
$_LANG['domainreleasetag'] = "New Registrar Tag";

# Ajax Order Form

$_LANG['orderformtitle'] = "Đơn đặt hàng";

$_LANG['signup'] = "Đăng ký";
$_LANG['loading'] = "Đang tải...";

$_LANG['ordersummarybegin'] = "Vui lòng chọn một sản phẩm để bắt đầu";

$_LANG['cartchooseproduct'] = "Lựa chọn dịch vụ";
$_LANG['cartconfigurationoptions'] = "Thiết lập cấu hình";

$_LANG['ordererrorsoccurred'] = "Đã xảy ra các lỗi sau và phải được sửa trước khi thanh toán:";
$_LANG['ordererrortermsofservice'] = "The Terms of Service must be agreed to";
$_LANG['ordertostickconfirm'] = "Vui lòng đánh dấu để xác nhận bạn đồng ý với";

$_LANG['cartnewcustomer'] = "Tôi là khách hàng mới";
$_LANG['cartexistingcustomer'] = "Đã có tài khoản khách hàng";

$_LANG['cartpromo'] = "Khuyến mãi";
$_LANG['cartenterpromo'] = "Nhập mã giảm giá";
$_LANG['cartremovepromo'] = "Xóa";

$_LANG['cartrecurringcharges'] = "Phí định kỳ";

$_LANG['cartenterdomain'] = "Vui lòng nhập tên miền bạn muốn sử dụng vào ô dưới.";

$_LANG['cartdomainavailableoptions'] = "Tên miền có sẵn, bạn có thể đăng ký!";
$_LANG['cartdomainavailableregister'] = "Please register this domain for";
$_LANG['cartdomainavailablemanual'] = "I will register it myself seperately";

$_LANG['cartdomainunavailableoptions'] = "Xin lỗi, tên miền này đã được sử dụng. Nếu bạn là chủ sở hữu, vui lòng chọn một tùy chọn bên dưới...";
$_LANG['cartdomainunavailabletransfer'] = "Vui lòng chuyển miền của tôi cho";
$_LANG['cartdomainunavailablemanual'] = "Tôi đã sở hữu miền này và sẽ cập nhật tên máy chủ";

$_LANG['cartdomaininvalid'] = "Tên miền quý khách vừa nhập không chính xác. Tên miền không bao gồm http:// hoặc www";

# Version 4.4

$_LANG['dlinvalidlink'] = "Liên kết sau không chính xác. Vui lòng liên hệ bộ phận hỗ trợ";

$_LANG['domaindnsmanagementlaunch'] = "Quản lý DNS";
$_LANG['domainemailforwardinglaunch'] = "Quản lý chuyển tiếp Email ";

# Version 4.5

$_LANG['domaindnspriority'] = "Mức độ ưu tiên";
$_LANG['domaindnsmxonly'] = "Mức độ ưu tiên chỉ áp dụng cho các bản ghi MX";

$_LANG['orderpromoprestart'] = "Khuyến mãi này vẫn chưa bắt đầu. Vui lòng thử lại sau.";

$_LANG['ticketmerge'] = "Đã gom lại";

$_LANG['quote'] = "Báo giá";
$_LANG['quotestitle'] = "Quản lý báo giá";
$_LANG['quoteview'] = "Xem";
$_LANG['quotedownload'] = "Tải về";
$_LANG['quoteacceptbtn'] = "Đồng ý báo giá";
$_LANG['quotedlpdfbtn'] = "Tải PDF";
$_LANG['quotediscountheading'] = "Giảm giá (%)";
$_LANG['noquotes'] = "Hiện tại không có báo giá nào được lưu trong tài khoản của bạn.<br />Để yêu cầu báo giá, vui lòng mở một vé.";
$_LANG['quotenumber'] = "Báo giá số #";
$_LANG['quotesubject'] = "Tiêu đề";
$_LANG['quotedatecreated'] = "Ngày tạo";
$_LANG['quotevaliduntil'] = "Hiệu lực đến";
$_LANG['quotestage'] = "Trạng thái";
$_LANG['quoterecipient'] = "Người nhận";
$_LANG['quoteqty'] = "Số lượng";
$_LANG['quotedesc'] = "Mô tả chi tiết";
$_LANG['quoteunitprice'] = "Đơn giá";
$_LANG['quotediscount'] = "Giảm giá %";
$_LANG['quotelinetotal'] = "Tổng cộng";
$_LANG['quotestagedraft'] = "Bản thảo";
$_LANG['quotestagedelivered'] = "Đã giao";
$_LANG['quotestageonhold'] = "Đang giữ";
$_LANG['quotestageaccepted'] = "Đã chấp nhận";
$_LANG['quotestagelost'] = "Hết hạn";
$_LANG['quotestagedead'] = "Hết hạn";
$_LANG['quoteref'] = "Phản hồi báo giá #";
$_LANG['quotedeposit'] = "Ký gửi";
$_LANG['quotefinalpayment'] = "Số dư tài khoản ký gửi";

$_LANG['invoiceoneoffpayment'] = "Make One Off Payment";
$_LANG['invoicesubscriptionpayment'] = "Khởi tạo thanh toán định kỳ tự động";

$_LANG['invoicepaymentpendingreview'] = "Cảm ơn! Thanh toán của bạn đã thành công và sẽ được áp dụng cho hóa đơn của bạn ngay sau khi Quy trình xem xét của 2CheckOut hoàn tất.<br /><br />Quá trình này có thể mất tới vài giờ nên bạn rất mong sự kiên nhẫn.";

$_LANG['step'] = "Bước %s";
$_LANG['cartdomainexists'] = "Tên miền đã tồn tại trên hệ thống";
$_LANG['cartcongratsdomainavailable'] = "Tên miền %s có thể đăng ký";
$_LANG['cartregisterhowlong'] = "Thời gian đăng ký";
$_LANG['cartdomaintaken'] = "Tên miền %s đã được đăng ký";
$_LANG['carttransfernotregistered'] = "%s chưa được đăng ký. Vui lòng kiểm tra lại.";
$_LANG['carttransferpossible'] = "Quý khách có thể chuyển quản lý tên miền %s về $tenweb chỉ với %s";
$_LANG['cartotherdomainsuggestions'] = "Other domains you might be interested in...";
$_LANG['cartdomainsconfiginfo'] = "Những lựa chọn và cài đặt có sẵn với tên miền của quý khách. Những ô có dấu * cần phải nhập không được để trống.";
$_LANG['cartnameserverchoice'] = "Lựa chọn  Nameserver";
$_LANG['cartnameserverchoicedefault'] = "Sử dụng DNS mặc định";
$_LANG['cartnameserverchoicecustom'] = "Sử dụng DNS tùy chỉnh";
$_LANG['cartfollowingaddonsavailable'] = "The following addons are available for your active products & services.";
$_LANG['cartregisterdomainchoice'] = "Đăng ký tên miền mới tại $tenweb";
$_LANG['carttransferdomainchoice'] = "Chuyển tên miền về $tenweb";
$_LANG['cartexistingdomainchoice'] = "Tôi đã có tên miền và sẽ tự cập nhật DNS";
$_LANG['cartsubdomainchoice'] = "Sử dụng một subdomain từ %s";
$_LANG['carterrordomainconfigskipped'] = "Bạn phải quay lại và hoàn thành việc bắt buộc cấu hình trường ở trên";
$_LANG['cartproductchooseoptions'] = "Tùy chọn";
$_LANG['cartproductselection'] = "Dịch vụ";
$_LANG['cartreviewcheckout'] = "Xác nhận & Thanh toán";
$_LANG['cartchoosecycle'] = "Thời gian thanh toán";
$_LANG['cartavailableaddons'] = "Dịch vụ bổ sung";
$_LANG['cartsetupfees'] = "Phí cài đặt";
$_LANG['cartchooseanotherproduct'] = "Chọn dịch vụ khác";
$_LANG['cartaddandcheckout'] = "Thêm vào giỏ hàng & Thanh toán";
$_LANG['cartchooseanothercategory'] = "Chọn danh mục dịch vụ khác";
$_LANG['carttryanotherdomain'] = "Đăng ký tên miền khác";
$_LANG['cartmakedomainselection'] = "Sản phẩm / dịch vụ quý khách đã chọn yêu cầu có tên miền, vui lòng lựa chọn tên miền theo các tùy chọn phía dưới";
$_LANG['cartfraudcheck'] = "Kiểm tra gian lận";

$_LANG['newcustomer'] = "Khách hàng mới";
$_LANG['existingcustomer'] = "Đã có tài khoản";
$_LANG['newcustomersignup'] = "<strong>Khách hàng mới?</strong> %sTạo tài khoản...%s";

$_LANG['upgradeonselectedoptions'] = "(On Selected Options)";
$_LANG['recurringpromodesc'] = "Mã khuyến mãi này cũng bao gồm %s Chiết khấu định kỳ<br />(Mã giảm giá này sẽ áp dụng cho những lần giới hạn tổng giá sản phẩm ở tương lai)";

# Version 4.5.2

$_LANG['ajaxcartcheckout'] = "Thanh toán ngay &raquo;";
$_LANG['ordersummarybegin'] = "Giỏ hàng đang rỗng<br/>Vui lòng chọn một sản phẩm / dịch vụ để bắt đầu ...";
$_LANG['ajaxcartconfigreqnotice'] = "Bạn liên tục đăng ký với chúng tôi nhưng bạn phải chọn tên miền trước khi có thể thêm sản phẩm đã chọn vào giỏ hàng của mình...";

# Version 5.0.0

$_LANG['cancelrequestdomain'] = "Hủy gia hạn tên miền?";
$_LANG['cancelrequestdomaindesc'] = "Bạn cũng đã đăng ký tên miền đang hoạt động cho miền được liên kết với sản phẩm này<br />Miền này sẽ được giới hạn vào %s với chi phí %s cho %s Năm/s<br /><br /> Nếu bạn cũng muốn hủy bỏ tên miền và để nó hết hạn khi kết thúc đăng ký, thì bạn chỉ cần đánh dấu vào ô bên dưới.";
$_LANG['cancelrequestdomainconfirm'] = "Tôi xác nhận không muốn gia hạn tên miền này";

$_LANG['startingfrom'] = "Bắt đầu từ";

$_LANG['orderpromopriceoverride'] = "Giá áp dụng";
$_LANG['orderpromofreesetup'] = "Miễn phí cài đặt";

$_LANG['thereisaproblem'] = "Oops, Có lỗi xảy ra...";
$_LANG['problemgoback'] = "Quay lại & thử lại";

$_LANG['quantity'] = "Số lượng";
$_LANG['cartqtyenterquantity'] = "Nhập số lượng:";
$_LANG['cartqtyupdate'] = "Cập nhật";
$_LANG['invoiceqtyeach'] = "/each";

$_LANG['nschoicedefault'] = "Sử dụng DNS mặc định";
$_LANG['nschoicecustom'] = "Sử dụng DNS tùy chỉnh";

$_LANG['jumpto'] = "Đi đến";
$_LANG['top'] = "Lên đầu";

$_LANG['domaincontactusexisting'] = "Sử dụng thông tin tài khoản hiện tại";
$_LANG['domaincontactusecustom'] = "Sử dụng thông tin khác";
$_LANG['domaincontactchoose'] = "Lựa chọn thông tin liên hệ";
$_LANG['domaincontactprimary'] = "Primary Profile Data";

$_LANG['invoicepdfgenerated'] = "PDF được tạo lúc";

$_LANG['domainrenewalsbeforerenewlimit'] = "Minimum Advance Renewal is %s Days";

$_LANG['promonewsignupsonly'] = "Mã giảm giá này chỉ áp dụng với khách hàng mới";

# Bulk Domain Management

$_LANG['domainbulkmanagement'] = "Quản lý nhiều tên miền";
$_LANG['domainbulkmanagementchangesaffect'] = "The changes made below will affect the following domains:";
$_LANG['domainbulkmanagementchangeaffect'] = "This change will apply to the following domains:";
$_LANG['domaincannotbemanaged'] = "không thể quản lý tự động - vui lòng liên hệ với bộ phận hỗ trợ bộ phận hỗ trợ về bất kỳ thay đổi nào bạn muốn thực hiện";
$_LANG['domainbulkmanagementnotpossible'] = "Rất tiếc, hiện tại không thể chỉnh sửa cài đặt này từ khu vực khách hàng của chúng tôi. Vui lòng liên hệ với bộ phận hỗ trợ để biết bất kỳ thay đổi nào bạn muốn thực hiện.";

$_LANG['domainmanagens'] = "Quản lý Nameservers";

$_LANG['domainautorenewstatus'] = "Tự động gia hạn";
$_LANG['domainautorenewinfo'] = "Tự động gia hạn giúp bảo vệ miền của bạn. Khi được bật, chúng tôi sẽ tự động gửi cho bạn hóa đơn gia hạn vài tuần trước khi miền của bạn hết hạn và gia hạn miền nếu thanh toán thành công.";
$_LANG['domainautorenewrecommend'] = "Chúng tôi khuyên bạn nên bật tính năng tự động gia hạn để tránh mất miền của mình.";

$_LANG['domainreglockstatus'] = "Registrar Lock";
$_LANG['domainreglockinfo'] = "Registrar Lock (Có thể hiểu là một dạng phòng chống mất cắp tên miền) sẽ bảo vệ tên miền của bạn khỏi các hành động chuyển tên miền trái phép.";
$_LANG['domainreglockrecommend'] = "Chúng tôi khuyến cáo quý khách nên kích hoạt chức năng này, trừ trường hợp quý khách cần chuyển tên miền về nhà đăng ký khác.";
$_LANG['domainreglockenable'] = "Kích hoạt Registrar Lock";
$_LANG['domainreglockdisable'] = "Tắt Registrar Lock";

$_LANG['domaincontactinfoedit'] = "Sửa thông tin liên hệ";

$_LANG['domainmassrenew'] = "Gia hạn tên miền";

# reCAPTCHA

$_LANG['captchatitle'] = "Xác nhận Spam Bot";
$_LANG['captchaverify'] = "Xin vui lòng nhập các ký tự mà bạn nhìn thấy trong hình dưới đây vào hộp văn bản được cung cấp. Điều này rất cần thiết để ngăn chặn SPAM.";
$_LANG['captchaverifyincorrect'] = "Các ký tự bạn đã nhập chưa chính xác . Vui lòng thử lại.";
$_LANG['googleRecaptchaIncorrect'] = "Vui lòng hoàn thành captcha và thử lại.";
$_LANG['recaptcha-invalid-site-private-key'] = "Có lỗi xảy ra. Vui lòng liên hệ với bộ phận hỗ trợ (mã lỗi: cap1)";
$_LANG['recaptcha-invalid-request-cookie'] = "Có lỗi xảy ra. Vui lòng thử lại (mã lỗi: cap2)";
$_LANG['recaptcha-incorrect-captcha-sol'] = "Các ký tự bạn đã nhập chưa chính xác . Vui lòng thử lại.";

# Product Bundles

$_LANG['bundledeal'] = "Bundle Deal!";
$_LANG['bundlevaliddateserror'] = "Bundle Unavailable";
$_LANG['bundlevaliddateserrordesc'] = "This bundle is either not yet active or has expired. If you feel this message to be an error, please contact support.";
$_LANG['bundlemaxusesreached'] = "Bundle Unavailable";
$_LANG['bundlemaxusesreacheddesc'] = "This bundle offer has reached the maximum number of uses allowed and so unfortunately is no longer available. Please contact us if you you're interested in our services to discuss.";
$_LANG['bundlereqsnotmet'] = "Bundle Requirements Not Met";
$_LANG['bundlewarningpromo'] = "The selected bundle cannot be used in conjunction with any other promotions or offers";
$_LANG['bundlewarningproductcycle'] = "The selected bundle requires you choose the billing cycle '%s' for product %s to qualify";
$_LANG['bundlewarningproductconfopreq'] = "The selected bundle requires you select '%s' for '%s' in order to qualify";
$_LANG['bundlewarningproductconfopyesnoenable'] = "The selected bundle requires you enable the option '%s' in order to qualify";
$_LANG['bundlewarningproductconfopyesnodisable'] = "The selected bundle requires you deselect the option '%s' in order to qualify";
$_LANG['bundlewarningproductconfopqtyreq'] = "The selected bundle requires you choose a quantity of '%s' for '%s' in order to qualify";
$_LANG['bundlewarningproductaddonreq'] = "The selected bundle requires you select the addon '%s' for product %s to qualify";
$_LANG['bundlewarningdomainreq'] = "The selected bundle requires you register or transfer a domain with the product %s to qualify";
$_LANG['bundlewarningdomaintld'] = "The selected bundle requires you choose a domain with the extension(s) '%s' for domain %s to qualify";
$_LANG['bundlewarningdomainregperiod'] = "The selected bundle requires you select the registration period '%s' for domain %s to qualify";
$_LANG['bundlewarningdomainaddon'] = "The selected bundle requires you select the addon '%s' for domain %s to qualify";

# New Client Area Template  Lines

$_LANG['navservices'] = "Dịch vụ";
$_LANG['navservicesorder'] = "Đăng ký dịch vụ";
$_LANG['navservicesplaceorder'] = "Đăng ký dịch vụ mới";
$_LANG['navdomains'] = "Tên miền";
$_LANG['navrenewdomains'] = "Gia hạn tên miền";
$_LANG['navregisterdomain'] = "Đăng ký tên miền";
$_LANG['navtransferdomain'] = "Chuyển tên miền";
$_LANG['navdomainsearch'] = "Tìm kiếm tên miền";
$_LANG['navbilling'] = "Thanh toán";
$_LANG['navinvoices'] = "Hóa đơn";
$_LANG['navsupport'] = "Hỗ trợ";
$_LANG['navtickets'] = "Ticket";
$_LANG['navopenticket'] = "Mở Ticket";
$_LANG['navmanagecc'] = "Quản lý thẻ tín dụng";
$_LANG['navemailssent'] = "Lịch sử Email";

$_LANG['hello'] = "Hi";
$_LANG['helloname'] = "Hi, %s!";
$_LANG['account'] = "Tài khoản";
$_LANG['login'] = "Đăng nhập";
$_LANG['register'] = "Đăng ký";
$_LANG['forgotpw'] = "Quên mật khẩu?";
$_LANG['editaccountdetails'] = "Sửa thông tin tài khoản";

$_LANG['clientareanavccdetails'] = "Thông tin thẻ tín dụng";
$_LANG['clientareanavcontacts'] = "Thông tin liên hệ";

$_LANG['manageyouraccount'] = "Quản lý tài khoản";
$_LANG['accountoverview'] = "Quản lý tài khoản";
$_LANG['paymentmethod'] = "Hình thức thanh toán";
$_LANG['paymentmethoddefault'] = "Sử dụng mặc định (cho từng đơn hàng)";
$_LANG['productmanagementactions'] = "Thao tác quản lý";
$_LANG['clientareanoaddons'] = "Bạn chưa đăng ký dịch vụ nào";
$_LANG['downloadssearch'] = "Tìm kiếm";
$_LANG['emailviewmessage'] = "Tìm hiểu thêm";
$_LANG['clientHomePanels']['productsAndServices'] = "Sản phẩm & Dịch vụ của $tenweb";
$_LANG['homepage']['submitTicket'] = "Yêu cầu hỗ trợ";
$_LANG['homepage']['manageServices'] = "Quản lý dịch vụ";
$_LANG['homepage']['manageDomains'] = "Quản lý tên miền";
$_LANG['homepage']['supportRequests'] = "Tạo phiếu hỗ trợ";
$_LANG['homepage']['makeAPayment'] = "Thanh toán hoá đơn";
$_LANG['homepage']['yourAccount'] = "Tài khoản của bạn";
$_LANG['howCanWeHelp'] = "$tenweb có thể giúp gì cho bạn?";
$_LANG['resultsperpage'] = "Danh sách kết quả / trang";
$_LANG['accessdenied'] = "Truy cập bị từ chối";
$_LANG['search'] = "Tìm kiếm";
$_LANG['cancel'] = "Hủy bỏ";
$_LANG['clientareabacklink'] = "&laquo; Quay lại";
$_LANG['backtoserviceslist'] = "&laquo; Quay lại danh sách dịch vụ";
$_LANG['backtodomainslist'] = "&laquo; Quay lại danh sách tên miền";

$_LANG['clientareahomeorder'] = "Visit the Order Form to browse the Products & Services we offer. Existing customers can also purchase optional extras and addons here.";
$_LANG['clientareahomelogin'] = "<font color='red';>Hãy đăng nhập hoặc lấy lại mật khẩu nếu bạn đã quên mật khẩu!</font>";
$_LANG['clientareahomeorderbtn'] = "Đăng ký dịch vụ";
$_LANG['clientareahomeloginbtn'] = "Đăng nhập";

$_LANG['clientareaproductsintro'] = "Danh sách các dịch vụ bạn đã đăng ký tại $tenweb.";
$_LANG['clientareaproductdetailsintro'] = "Thông tin chi tiết về các sản phẩm / dịch vụ của bạn đã đăng ký.";
$_LANG['clientareadomainsintro'] = "Danh sách các tên miền bạn đã đăng ký tại $tenweb.";
$_LANG['invoicesintro'] = "Danh sách các hóa đơn dịch vụ đã đăng ký tại $tenweb.";
$_LANG['quotesintro'] = "Danh sách báo giá chúng tôi đã gửi cho bạn.";
$_LANG['emailstagline'] = "Dưới đây là những Email mà chúng tôi đã gửi cho bạn.";
$_LANG['supportticketsintro'] = "Gửi và theo dõi các Ticket tại đây.";
$_LANG['addfundsintro'] = "Sử dụng tài khoản trả trước để thanh toán dịch vụ nhanh hơn";
$_LANG['registerintro'] = "Trải nghiệm các dịch vụ của chúng tôi ...";
$_LANG['masspayintro'] = "Thanh toán tất cả các hóa đơn dưới đây chỉ với một thao tác duy nhất";
$_LANG['domaincheckerintro'] = "Bắt đầu việc đăng ký bằng việc kiểm tra sự tồn tại của tên miền bạn muốn sử dụng...";
$_LANG['networkstatusintro'] = "Thông tin tình trạng dịch vụ";

$_LANG['creditcardyourinfo'] = "Thông tin thanh toán";
$_LANG['ourlatestnews'] = "Thông báo mới";
$_LANG['ccexpiringsoon'] = "Thẻ tín dụng sắp hết hạn";
$_LANG['ccexpiringsoondesc'] = "Thẻ tín dụng của bạn sắp hết hạn. Vui lòng %scập nhật thông tin%s";
$_LANG['availcreditbal'] = "Số dư tài khoản";
$_LANG['availcreditbaldesc'] = "Số dư  tài khoản %s ";
$_LANG['youhaveoverdueinvoices'] = "Quý khách có %s hóa đơn quá hạn thanh toán";
$_LANG['overdueinvoicesdesc'] = "Để tránh trường hợp dịch vụ bị tạm ngưng, vui lòng thanh toán hóa đơn quá hạn sớm nhất có thể. %sThanh toán ngay &raquo;%s";
$_LANG['supportticketsnoneopen'] = "Hiện tại bạn không có Ticket này đang mở";
$_LANG['invoicesnoneunpaid'] = "Hiện tại bạn không có hóa đơn nào chưa thanh toán";

$_LANG['registerdisablednotice'] = "Để tạo tài khoản khách vui lòng thực hiện<strong><a href=\"cart.php\">đăng ký dịch vụ</a></strong>";
$_LANG['registerCreateAccount'] = "Để tạo tài khoản khách vui lòng";
$_LANG['registerCreateAccountOrder'] = "thực hiện đăng ký dịch vụ";

$_LANG['pwstrength'] = "Mức độ an toàn của Mật khẩu";
$_LANG['pwstrengthenter'] = "Nhập mật khẩu";
$_LANG['pwstrengthweak'] = "Yếu";
$_LANG['pwstrengthmoderate'] = "Trung bình";
$_LANG['pwstrengthstrong'] = "Mạnh";

$_LANG['managing'] = "Quản lý";
$_LANG['information'] = "Thông tin chung";
$_LANG['withselected'] = "Thao tác mục đã chọn";
$_LANG['managedomain'] = "Quản lý tên miền";
$_LANG['changenameservers'] = "Thay đổi Nameservers";
$_LANG['clientareadomainmanagedns'] = "Quản lý DNS";
$_LANG['clientareadomainmanageemailfwds'] = "Quản lý Email Forwards";
$_LANG['moduleactionsuccess'] = "Thao tác thành công !";
$_LANG['moduleactionfailed'] = "Thao tác không thành công";

$_LANG['domaininfoexp'] = "Quý khách có thể tìm kiếm thông tin tên miền ở khung bên hoặc chuyển qua các tab chức năng ở trên.";
$_LANG['domainrenewexp'] = "Bật chức năng tự động gia hạn để tránh trường hợp mất tên miền do hết hạn.";
$_LANG['domainnsexp'] = "Quý khách có thể thay đổi DNS của tên miền tại đây. (Quá trình thay đổi có thể phải mất đến 24 giờ)";
$_LANG['domainlockingexp'] = "Registry Lock là dịch vụ khóa tên miền quốc tế ở cấp độ Registry (đơn vị quản lý tên miền quốc tế) để bảo vệ tên miền an toàn tuyệt đối không thể bị hack, đánh cắp chuyển sang nhà đăng ký (Registrar) khác hay can thiệp thay đổi thông số của tên miền quốc tế như DNS.";
$_LANG['domaincurrentlyunlocked'] = "Registry Lock đang tắt!";
$_LANG['domaincurrentlyunlockedexp'] = "Quý khách lưu ý chỉ tắt Registry Lock khi muốn chuyển tên miền sang nhà đăng ký khác.";
$_LANG['searchmultipletlds'] = "Tìm kiếm nhiều tên miền";

$_LANG['networkstatustitle'] = "Networks";
$_LANG['networkstatusnone'] = "There are no %s Network Issues Currently";
$_LANG['serverstatusheadingtext'] = "Below is a real-time overview of our servers where you can check if there's any known issues.";

$_LANG['clientareacancelreasonrequired'] = "Bạn cần điền lý do hủy";

$_LANG['addfundsdescription'] = "Khi có tiền trong tài khoản trả trước hệ thống sẽ tự động kích hoạt thanh toán cho những hóa đơn dịch vụ đăng ký mới hoặc các hóa đơn gia hạn dịch vụ.";
$_LANG['addfundsnonrefundable'] = "* Số tiền nạp vào được hiển thị ở mục số dư tài khoản của quý khách và không được hoàn lại.";

$_LANG['creditcardexpirydateinvalid'] = "The expiry date must be entered in the format MM/YY and must not be in the past";

$_LANG['domaincheckerchoosedomain'] = "Lựa chọn một Domain...";
$_LANG['domaincheckerchecknewdomain'] = "Kiểm tra tính khả dụng của tên miền";
$_LANG['domaincheckerdomainexample'] = " ví dụ: yourdomain.com";
$_LANG['domaincheckerinvalidtld'] = "is not a valid TLD. Please try again.";
$_LANG['domaincheckerhostingonly'] = "Chỉ đăng ký Hosting";
$_LANG['domaincheckeravailtransfer'] = "Available for Transfer";
$_LANG['domaincheckerenterdomain'] = "Bắt đầu trải nghiệm dịch vụ lưu trữ web của bạn với chúng tôi bằng cách nhập tên miền bạn muốn đăng ký, chuyển nhượng hoặc đơn giản là mua dịch vụ lưu trữ bên dưới...";
$_LANG['domaincheckerbulkinvaliddomain'] = "One or more of the domains you entered above was invalid and so has been ommitted from the results";

$_LANG['kbquestionsearchere'] = "Tìm kiếm câu hỏi quý khách cần giải đáp.";
$_LANG['contactus'] = "Liên hệ";

$_LANG['opennewticket'] = "Gửi Ticket mới";
$_LANG['searchtickets'] = "Nhập mã số hoặc tiêu đề Ticket ";
$_LANG['supportticketspriority'] = "Mức độ ưu tiên";
$_LANG['supportticketsubmitted'] = "Đã gửi";
$_LANG['supportticketscontact'] = "Liên hệ";
$_LANG['supportticketsticketlastupdated'] = "Lần cập nhật cuối";

$_LANG['upgradedowngradepackage'] = "Nâng cấp dịch vụ";
$_LANG['upgradedowngradechooseproduct'] = "Chọn sản phẩm / dịch vụ";

$_LANG['jobtitlereqforcompany'] = "(Bắt buộc nếu là Công ty / Tổ chức)";

$_LANG['downloadproductrequired'] = "Downloading this item requires you to have an active instance of the following product/service:";

$_LANG['affiliatesignuptitle'] = "Get Paid for Referring Customers to Us";
$_LANG['affiliatesignupintro'] = "Activate your affiliate account and start earning money today...";
$_LANG['affiliatesignupinfo1'] = "We pay commissions for every signup that comes via your custom signup link.";
$_LANG['affiliatesignupinfo2'] = "We track the visitors you refer to us using cookies, so users you refer don't have to purchase instantly for you to receive your commission.  Cookies last for up to 90 days following the initial visit.";
$_LANG['affiliatesignupinfo3'] = "If you would like to find out more, please contact us.";

# Version 5.1

$_LANG['copyright'] = "Copyright";
$_LANG['allrightsreserved'] = "All Rights Reserved";
$_LANG['supportticketsclose'] = "Đóng Ticket";
$_LANG['affiliatesinitialthen'] = "Initially then";
$_LANG['invoicesoutstandingbalance'] = "Số tiền chưa thanh toán";

$_LANG['cpanellogin'] = "Đăng nhập vào cPanel";
$_LANG['cpanelwhmlogin'] = "Đăng nhập vào  WHM";
$_LANG['cpanelwebmaillogin'] = "Đăng nhập vào Webmail";
$_LANG['enkompasslogin'] = "Đăng nhập vào Enkompass";
$_LANG['plesklogin'] = "Đăng nhập vào Plesk Control Panel";
$_LANG['helmlogin'] = "Đăng nhập vào Helm Control Panel";
$_LANG['hypervmrestart'] = "Khởi động lại VPS Server";
$_LANG['siteworxlogin'] = "Đăng nhập vào  SiteWorx Control Panel";
$_LANG['nodeworxlogin'] = "Đăng nhập vào NodeWorx Control Panel";
$_LANG['veportallogin'] = "Đăng nhập vào vePortal";
$_LANG['virtualminlogin'] = "Đăng nhập vào Control Panel";
$_LANG['websitepanellogin'] = "Đăng nhập vào Control Panel";
$_LANG['whmsoniclogin'] = "Đăng nhập vào Control Panel";
$_LANG['xpanelmaillogin'] = "Đăng nhập vào Webmail";
$_LANG['xpanellogin'] = "Đăng nhập vào XPanel";
$_LANG['heartinternetlogin'] = "Đăng nhập vào Control Panel";
$_LANG['gamecplogin'] = "Đăng nhập vào GameCP";
$_LANG['fluidvmrestart'] = "Khởi động lại VPS Server";
$_LANG['enomtrustedesc'] = "The TRUSTe Control Panel contains the set up wizard to get your Privacy Policy up and running.";
$_LANG['enomtrustelogin'] = "Đăng nhập vào TrustE Control Panel";
$_LANG['directadminlogin'] = "Đăng nhập vào DirectAdmin";
$_LANG['centovacastlogin'] = "Đăng nhập vào Centova Cast";
$_LANG['castcontrollogin'] = "Đăng nhập vào Control Panel";

$_LANG['sslconfigurenow'] = "Thiết lập ngay";
$_LANG['sslprovisioningdate'] = "Ngày cấp SSL";
$_LANG['globalsignvoucherscode'] = "Mã giảm giá OneClickSSL của bạn";
$_LANG['globalsignvouchersnotissued'] = "Chưa được cấp";

$_LANG['domaintrffailreasonunavailable'] = "Failure Reason Unavailable";

$_LANG['clientareaprojects'] = "Quản lý dự án";

$_LANG['clientgroupdiscount'] = "Giảm giá";
$_LANG['billableitemshours'] = "giờ";
$_LANG['billableitemshour'] = "giờ";

$_LANG['invoicefilename'] = "HD-";
$_LANG['quotefilename'] = "BG-";

# Domain Addons

$_LANG['domainaddons'] = "Dịch vụ bổ sung";
$_LANG['domainaddonsinfo'] = "Các dịch vụ bổ sung hiện có sẵn cho tên miền của quý khách ...";
$_LANG['domainaddonsdnsmanagement'] = "Quản lý DNS";
$_LANG['domainaddonsidprotectioninfo'] = "ID Protection sẽ giúp quý khách ẩn các thông tin tên miền quan trọng khỏi sự nhòm ngó của những cá nhân hay tổ chức chuyên spam hoặc thu thập thông tin để bán lại.";
$_LANG['domainaddonsdnsmanagementinfo'] = "Chức năng quản lý DNS giúp quý khách cấu hình các thông số domain tiện lợi nhanh chóng và hoàn toàn miễn phí.";
$_LANG['domainaddonsemailforwardinginfo'] = "Email Forwarding cho phép tạo các địa chỉ email với định dạng tenhopmail@tenmien.vn, các hộp email này sẽ forward email đến địa chỉ email thực sự của bạn (như @yahoo.com, @gmail.com, ...)";
$_LANG['domainaddonsbuynow'] = "Đăng ký";
$_LANG['domainaddonsperyear'] = "/năm";
$_LANG['domainaddonscancelareyousure'] = "Vui lòng xác nhận tắt & hủy dịch vụ bổ sung này?";
$_LANG['domainaddonsconfirm'] = "Xác nhận hủy dịch vụ";
$_LANG['domainaddonscancelsuccess'] = "Đã hủy dịch vụ bổ sung thành công!";
$_LANG['domainaddonscancelfailed'] = "Hủy dịch vụ không thành công. Vui lòng liên hệ với bộ phận kỹ thuật.";

# Version 5.2

$_LANG['yourclientareahostingaddons'] = "Quý khách đang sử dụng các dịch vụ bổ sung sau.";
$_LANG['loginrequired'] = "Yêu cầu đăng nhập";
$_LANG['unsubscribe'] = "Hủy đăng ký nhận tin";
$_LANG['emailoptout'] = "Newsletter Opt-out";
$_LANG['newsletterunsubscribe'] = "Hủy đăng ký nhận tin";
$_LANG['emailoptoutdesc'] = "Đánh dấu để hủy đăng ký nhận tin cập nhật của chúng tôi";
$_LANG['alreadyunsubscribed'] = "Bạn đã hủy đăng ký nhận tin cập nhật của chúng tôi.";
$_LANG['newsletterresubscribe'] = "Nếu bạn muốn đăng ký nhận tin của chúng tôi, bạn có thể thực hiện tại %sMy Details%s bất cứ lúc nào.";
$_LANG['unsubscribehashinvalid'] = "Hủy đăng ký không thành công, vui lòng thử lại hoặc liên hệ với chúng tôi.";
$_LANG['unsubscribesuccess'] = "Hủy đăng ký thành công!";
$_LANG['newsletterremoved'] = "Email của bạn đã được xóa khỏi danh sách nhận bản tin của chúng tôi.";
$_LANG['erroroccured'] = "Có lỗi xảy ra";
$_LANG['pwresetsuccessdesc'] = "Mật khẩu của bạn đã được thiết lập lại. %sClick vào đây%s để quay lại trang khách hàng...";
$_LANG['pwresetenternewpw'] = "Vui lòng điền mật khẩu mong muốn vào ô dưới.";
$_LANG['ordererrorsbudomainbanned'] = "Subdomain bạn nhập không phù hợp, vui lòng thử subdomain khác";

$_LANG['ticketfeedbacktitle'] = "Chia sẻ mức độ hài lòng về Ticket";

$_LANG['nosupportdepartments'] = "Không có sẵn bộ phận hỗ trợ nào. Xin vui lòng thử lại sau";

$_LANG['feedbackclosed'] = "Ý kiến đóng góp chỉ khả dụng khi Ticket đã đóng";
$_LANG['feedbackprovided'] = "Quý khách đã chia sẻ mức độ hài lòng cho Ticket này";
$_LANG['feedbackthankyou'] = "$tenweb xin chân thành cảm ơn quý khách đã dành thời gian hoàn tất bản khảo sát. Mọi ý kiến đóng góp của quý khách có ý nghĩa rất lớn với chúng tôi.";
$_LANG['feedbackreceived'] = "Ý kiến đánh giá / đóng góp đã được gửi";
$_LANG['feedbackdesc'] = "Với mong muốn không ngừng nâng cao chất lượng dịch vụ để phục vụ khách hàng ngày càng tốt hơn, $tenweb rất mong nhận được các ý kiến đánh giá / đóng góp quý báu của quý khách.";
$_LANG['feedbackclickreview'] = "Click vào đây để xem lại Ticket";
$_LANG['feedbackopenedat'] = "Thời gian mở ticket";
$_LANG['feedbacklastreplied'] = "Thời gian trả lời cuối";
$_LANG['feedbackstaffinvolved'] = "Hỗ trợ viên";
$_LANG['feedbacktotalduration'] = "Thời gian xử lý yêu cầu";
$_LANG['feedbackpleaserate1'] = "Xin quý khách cho điểm (thang điểm từ 1 đến 10) đánh giá cách nhân viên";
$_LANG['feedbackpleasecomment1'] = "Ý kiến khác về cách nhân viên";
$_LANG['feedbackhandled'] = "xử lý yêu cầu hỗ trợ của quý khách";
$_LANG['feedbackworst'] = "Chưa tốt";
$_LANG['feedbackbest'] = "Hài lòng";
$_LANG['feedbackimprove'] = "Ý kiến đóng góp riêng của Quý khách để $tenweb ngày càng phát triển.";
$_LANG['pleaserate2'] = "xử lý yêu cầu hỗ trợ của quý khách";
$_LANG['returnclient'] = "Trở về trang khách hàng";

$_LANG['clientareanavsecurity'] = "Cấu hình bảo mật";
$_LANG['twofactorauth'] = "Xác minh 2 bước";
$_LANG['twofaenable'] = "Bật xác minh 2 bước";
$_LANG['twofadisable'] = "Tắt xác minh 2 bước";
$_LANG['twofaenableclickhere'] = "Bật xác minh 2 bước";
$_LANG['twofadisableclickhere'] = "Tắt xác minh 2 bước";
$_LANG['twofaenforced'] = "For your security, we require that you must enable Two-Factor Authentication before you can continue. This page will guide you through the process of setting it up.";
$_LANG['twofasetup'] = "Thiết lập xác minh 2 bước";
$_LANG['twofasetupgetstarted'] = "Bắt đầu";
$_LANG['twofaactivationintro'] = "Bất cứ khi nào bạn đăng nhập vào hệ thống, bạn sẽ nhập mật khẩu của mình như thường lệ. Sau đó, một mã sẽ được gửi tới điện thoại của bạn thông qua tin nhắn SMS, cuộc gọi thoại hoặc ứng dụng dành cho thiết bị di động của chúng tôi.";
$_LANG['twofaactivationmultichoice'] = "To continue, please choose your desired Two-Factor Authentication method from below.";
$_LANG['twofadisableintro'] = "To disable Two-Factor Authentication please confirm your password in the field below.";
$_LANG['twofaactivationerror'] = "An error occurred while attempting to activate Two-Factor Authentication for your account. Please try again.";
$_LANG['twofamoduleerror'] = "An error occurred loading the module. Please try again.";
$_LANG['twofaactivationcomplete'] = "Two-Factor Authentication Setup is Complete!";
$_LANG['twofadisableconfirmation'] = "Two-Factor Authentication has now been disabled for your account.";
$_LANG['twofabackupcodeis'] = "Mã dự phòng của bạn là";
$_LANG['twofanewbackupcodeis'] = "Mã dự phòng mới của bạn là gì";
$_LANG['twofabackupcodelogin'] = "Enter Your Backup Code to Login";
$_LANG['twofabackupcodeexpl'] = "Write this down on paper and keep it safe.<br />It will be needed if you ever lose your 2nd factor device or it is unavailable to you.";
$_LANG['twofaconfirmpw'] = "Enter Your Password";
$_LANG['twofa2ndfactorreq'] = "Your second factor is required to complete login.";
$_LANG['twofa2ndfactorincorrect'] = "The second factor you supplied was incorrect. Please try again.";
$_LANG['twofabackupcodereset'] = "Login via Backup Code Successful<br />Backup Codes are valid once only. It will now be reset.";
$_LANG['twofacantaccess2ndfactor'] = "Can't Access Your 2nd Factor Device?";
$_LANG['twofaloginusingbackupcode'] = "Đăng nhập sử dụng mã dự phòng";
$_LANG['twofageneralerror'] = "Có lỗi xảy ra. Vui lòng thử lại";

$_LANG['continue'] = "Tiếp tục";
$_LANG['disable'] = "Tắt";
$_LANG['manage'] = "Quản lý";

# Version 5.3
$_LANG['quoteacceptancetitle'] = "Quote Acceptance";
$_LANG['quoteacceptancehowto'] = "To accept the quote, please confirm your acceptance of our terms of service which can be viewed @";
$_LANG['quoteacceptancewarning'] = "Please be aware that accepting a quote is considered entering into a contract and you will not be able to cancel once accepted.";

$_LANG['contactform'] = "Mẫu liên hệ";

$_LANG['twoipverificationstep'] = "Verification Step";
$_LANG['twoipverificationstepmsg'] = "Enter the security code generated by your mobile authenticator app and we'll make sure it's configured correctly before enabling it.";
$_LANG['twoipverificationerror'] = "It seem's there's a problem...";
$_LANG['twoipcodemissmatch'] = "The code you entered did not match what was expected. Please try again.";
$_LANG['twoiptimebasedpassword'] = "Thiết lập xác minh 2 bước";
$_LANG['twoiptimebasedexplain'] = "This authentication option get's it's second factor using a time based algorithm.  Your mobile phone can be used to generate the codes.  If you don't already have an app that can do this, we recommend Google Authenticator which is available for iOS, Android and Windows mobile devices.";
$_LANG['twoipconfigureapp'] = "To configure your authenticator app:";
$_LANG['twoipconfigurestep1'] = "Begin by selecting to add a new time based token";
$_LANG['twoipconfigurestep2'] = "Then use your app to scan the barcode below, or alternatively enter this secret key manually: ";
$_LANG['twoipgdmissing'] = "GD is missing from the PHP build on your server so unable to generate image";

$_LANG['domaincontactdetails']['First Name'] = "Tên";
$_LANG['domaincontactdetails']['Last Name'] = "Họ";
$_LANG['domaincontactdetails']['Full Name'] = "Họ & Tên";
$_LANG['domaincontactdetails']['Contact Name'] = "Tên liên hệ";
$_LANG['domaincontactdetails']['Email'] = "Email";
$_LANG['domaincontactdetails']['Email Address'] = "Địa chỉ Email";
$_LANG['domaincontactdetails']['Job Title'] = "Chức vụ";
$_LANG['domaincontactdetails']['Company Name'] = "Công ty";
$_LANG['domaincontactdetails']['Organisation Name'] = "Tên tổ chức";
$_LANG['domaincontactdetails']['Address'] = "Địa chỉ";
$_LANG['domaincontactdetails']['Street'] = "Đường";
$_LANG['domaincontactdetails']['Address 1'] = "Địa chỉ 1";
$_LANG['domaincontactdetails']['Address 2'] = "Địa chỉ 2";
$_LANG['domaincontactdetails']['Address 3'] = "Địa chỉ 3";
$_LANG['domaincontactdetails']['City'] = "Tỉnh / Thành phố";
$_LANG['domaincontactdetails']['State'] = "Vùng miền (State)";
$_LANG['domaincontactdetails']['County'] = "Quốc gia";
$_LANG['domaincontactdetails']['Region'] = "Region";
$_LANG['domaincontactdetails']['Postcode'] = "Postcode";
$_LANG['domaincontactdetails']['ZIP Code'] = "ZIP Code";
$_LANG['domaincontactdetails']['ZIP'] = "ZIP";
$_LANG['domaincontactdetails']['Country'] = "Quốc gia";
$_LANG['domaincontactdetails']['Phone'] = "Số điện thoại";
$_LANG['domaincontactdetails']['Phone Number'] = "Số điện thoại";
$_LANG['domaincontactdetails']['Fax'] = "Số Fax";

$_LANG['serverhostnameexample'] = "ví dụ: server1(.yourdomain.com)";
$_LANG['serverns1prefixexample'] = "ví dụ: ns1(.yourdomain.com)";
$_LANG['serverns2prefixexample'] = "ví dụ: ns2(.yourdomain.com)";

$_LANG['hosting'] = "Hosting";

$_LANG['enomfrregistration']['Heading'] = ".fr domains have different required values depending on your nationality and type of registration:";
$_LANG['enomfrregistration']['French Individuals']['Name'] = "French Individuals";
$_LANG['enomfrregistration']['French Individuals']['Requirements'] = "Please provide your \"Birthdate\", \"Birthplace City\", and \"Birthplace Postcode\".";
$_LANG['enomfrregistration']['EU Non-French Individuals']['Name'] = "EU Non-French Individuals";
$_LANG['enomfrregistration']['EU Non-French Individuals']['Requirements'] = "Please provide your \"Birthdate\".";
$_LANG['enomfrregistration']['French Companies']['Name'] = "French Companies";
$_LANG['enomfrregistration']['French Companies']['Requirements'] = "Please provide the \"Birthdate\", \"Birthplace City\", and \"Birthplace Postcode\" for the owner contact, along with your SIRET number.";
$_LANG['enomfrregistration']['EU Non-French Companies']['Name'] = "EU Non-French Companies";
$_LANG['enomfrregistration']['EU Non-French Companies']['Requirements'] = "Please provide the company \"DUNS Number\", and the \"Birthdate\" of the Owner Contact.";
$_LANG['enomfrregistration']['Non-EU Warning'] = "Client contact information must be within the EU or else registration will fail.";

$_LANG['confirm'] = "Xác nhận";

$_LANG['maxmind_checkconfiguration'] = "Có lỗi xảy ra với hệ thống phát hiện gian lận. Vui lòng liên hệ bộ phận hỗ trợ.";
$_LANG['maxmind_addressinvalid'] = "Địa chỉ của bạn không được ghi nhận. Vui lòng kiểm tra và nhập lại";
$_LANG['maxmind_invalidip'] = "Địa chỉ IP không phù hợp. Vui lòng liên hệ bộ phận hỗ trợ.";

$_LANG['ssounabletologin'] = "Không thể tự động đăng nhập. Vui lòng liên hệ bộ phận hỗ trợ.";
$_LANG['ssofatalerror'] = "Có lỗi xảy ra. Vui lòng liên hệ bộ phận hỗ trợ.";

# Version 6.0

$_LANG['announcementschoosemonth'] = "Chọn tháng";
$_LANG['announcementsbymonth'] = "Thông báo theo tháng";
$_LANG['announcementsolder'] = "Các thông báo cũ hơn";
$_LANG['createnewcontact'] = "Thêm thông tin mới ...";
$_LANG['due'] = "Đến hạn";
$_LANG['affiliatessignups'] = "Lượt đăng ký";
$_LANG['affiliatesconversionrate'] = "Tỷ lệ";
$_LANG['affiliatesclicks'] = "Lượt Click";
$_LANG['contacts'] = "Thông tin liên hệ";
$_LANG['backtoservicedetails'] = "Quay lại chi tiết dịch vụ";
$_LANG['invoicesintro'] = "Danh sách các hóa đơn dịch vụ đã đăng ký tại $tenweb.";

$_LANG['sidebars']['viewAccount']['yourAccount'] = "Quản lý tài khoản";
$_LANG['sidebars']['viewAccount']['myDetails'] = "Chi tiết tài khoản";
$_LANG['sidebars']['viewAccount']['billingInformation'] = "Thông tin thanh toán";
$_LANG['sidebars']['viewAccount']['contacts/subAccounts'] = "Thông tin liên hệ";
$_LANG['sidebars']['viewAccount']['changePassword'] = "Thay đổi mật khẩu";
$_LANG['sidebars']['viewAccount']['securitySettings'] = "Cấu hình bảo mật";
$_LANG['sidebars']['viewAccount']['emailHistory'] = "Lịch sử Email";

$_LANG['aboutsecurityquestions'] = "Câu hỏi bí mật ?";
$_LANG['registersecurityquestionblurb'] = "Việc đặt câu hỏi bí mật giúp chúng tôi nhận diện bạn là chủ nhân của tài khoản.";

$_LANG['update'] = "Cập nhật";
$_LANG['yourinfo'] = "Thông tin tài khoản";
$_LANG['shortcuts'] = "Liên kết nhanh";

$_LANG['yourservices'] = "Quản lý dịch vụ";
$_LANG['yourdomains'] = "Quản lý tên miền";
$_LANG['yourtickets'] = "Quản lý ticket";
$_LANG['managecontacts'] = "Quản lý liên hệ";
$_LANG['billingdetails'] = "Chi tiết thanh toán";
$_LANG['homechooseproductservice'] = "Chọn một sản phẩm / dịch vụ cần quản lý:";

$_LANG['invoicesdue'] = "Hóa đơn quá hạn";
$_LANG['invoicesduemsg'] = "Quý khách có %s hóa đơn chưa thanh toán với tổng số tiền là %s";
$_LANG['noinvoicesduemsg'] = "Quý khách không có hóa đơn nào cần thanh toán.";

$_LANG['expiringsoon'] = "Sắp hết hạn";

$_LANG['notice'] = "Thông báo";
$_LANG['networkstatussubtitle'] = "Thông tin mới";

$_LANG['myaccount'] = "Quản lý tài khoản";

$_LANG['manageproduct'] = "Quản lý dịch vụ";
$_LANG['overview'] = "Tổng quan";
$_LANG['servername'] = "Tên Server";
$_LANG['visitwebsite'] = "Truy cập website";
$_LANG['whoisinfo'] = "Thông tin WHOIS";

$_LANG['tableshowing'] = "Hiển thị _START_ đến _END_ của _TOTAL_ mục";
$_LANG['tableempty'] = "Hiển thị 0 đến 0 của 0 mục";
$_LANG['tablefiltered'] = "(được lọc từ _MAX_ total mục)";
$_LANG['tablelength'] = "Hiển thị _MENU_ mục";
$_LANG['tableloading'] = "Đang tải ...";
$_LANG['tableprocessing'] = "Đang xử lý ...";
$_LANG['tablepagesfirst'] = "Đầu";
$_LANG['tablepageslast'] = "Cuối";
$_LANG['tablepagesnext'] = "Sau";
$_LANG['tablepagesprevious'] = "Trước";
$_LANG['tableviewall'] = "Tất cả";
$_LANG['tableentersearchterm'] = "Tìm kiếm ...";

$_LANG['actions'] = "Hành động";

$_LANG['upgradedowngradeshort'] = "Up/Downgrade";

$_LANG['masspayintro'] = "Thanh toán nhanh tất cả các hóa đơn";
$_LANG['masspaymentselectgateway'] = "Chọn hình thức thanh toán";

$_LANG['ticketfeedbackrequest'] = "Ý kiến đánh giá";
$_LANG['ticketfeedbackforticket'] = "cho Ticket #";

$_LANG['notifications'] = "Thông báo";
$_LANG['notificationsnone'] = "Bạn không có thông báo nào.";

$_LANG['creditcardnonestored'] = "No card on file";

$_LANG['kbviewingarticlestagged'] = "Viewing articles tagged";

$_LANG['domainprivatenameservers'] = "Nameservers riêng";

$_LANG['transferinadomain'] = "Chuyển tên miền";

$_LANG['nodomainextensions'] = "There are no Domain Extensions currently configured for purchase";

$_LANG['homebegin'] = "Bắt đầu bằng cách tìm kiếm tên miền phù hợp với bạn...";
$_LANG['howcanwehelp'] = "Chúng tôi có thể giúp gì cho bạn?";
$_LANG['exampledomain'] = "ví dụ: yourdomain.com";
$_LANG['buyadomain'] = "Đăng ký tên miền";
$_LANG['orderhosting'] = "Đăng ký Hosting";
$_LANG['makepayment'] = "Thực hiện thanh toán";
$_LANG['getsupport'] = "Gửi yêu cầu hỗ trợ";

$_LANG['news'] = "Thông báo & Tin tức mới";
$_LANG['allthelatest'] = "Cập nhật thông tin mới nhất từ";
$_LANG['readmore'] = "Đọc thêm";
$_LANG['noannouncements'] = "Không có thông báo & tin tức nào";

$_LANG['kbsearchexplain'] = "Bạn có thắc mắc. Hãy tìm kiếm các câu hỏi thường gặp tại đây.";
$_LANG['readyforquestions'] = "Chúng tôi luôn sẵn sàng trả lời thắc mắc của bạn";

$_LANG['restrictedpage'] = "";
$_LANG['enteremail'] = "Nhập email";

$_LANG['passwordtips'] = "<strong>Một số mẹo về cách tạo mật khẩu mạnh</strong><br /><small>Sử dụng mật khẩu duy nhất cho mỗi tài khoản quan trọng của bạn<br />Sử dụng kết hợp chữ cái, chữ số và ký hiệu trong mật khẩu của bạn<br />Không dùng thông tin cá nhân hoặc các từ thông dụng làm mật khẩu</small>";

$_LANG['regdate'] = "Ngày đăng ký";
$_LANG['nextdue'] = "Ngày hết hạn";

$_LANG['domaincheckertagline'] = "Tìm kiếm tên miền phù hợp với bạn...";
$_LANG['findyourdomain'] = "Nhập tên miền cần đăng ký";
$_LANG['searchtermrequired'] = "Quý khách vui lòng nhập tên miền hoặc từ khóa cần kiểm tra";
$_LANG['unabletolookup'] = "Xin lỗi, không thể kiểm tra tên miền đã yêu cầu";
$_LANG['invalidchars'] = "Vui lòng xóa khoảng trắng hoặc ký tự đặc biệt trong từ khóa cần kiểm tra";
$_LANG['bulkoptions'] = "Kiểm tra nhiều tên miền";
$_LANG['checkingdomain'] = "Đang kiểm tra tính sẵn có của tên miền ...";
$_LANG['domainsgotocheckout'] = "Thanh toán";
$_LANG['domainssearchresults'] = "Kết quả tìm kiếm";
$_LANG['domainssuggestions'] = "Gợi ý";
$_LANG['domainsothersuggestions'] = "Một số tên miền thay thế có thể bạn quan tâm";
$_LANG['domainsmoresuggestions'] = "Gợi ý khác !";
$_LANG['domainssuggestionswarnings'] = "Tên miền gợi ý không phải luôn luôn có sẵn. Tính sẵn có của tên miền chỉ chính xác khi thực hiện đăng ký.";
$_LANG['disclaimers'] = "Từ chối trách nhiệm";
$_LANG['tldpricing'] = "Pricing";
$_LANG['alltldpricing'] = "Giá tất cả tên miền";

$_LANG['quotesdesc'] = "Danh sách báo giá chúng tôi đã gửi cho bạn.";
$_LANG['quotesrejected'] = "Đã từ chối";

$_LANG['ticketsyourhistory'] = "Các ticket đã gửi";

$_LANG['clientareaemaildesc'] = "Dưới đây là những Email mà chúng tôi đã gửi cho bạn.";

$_LANG['sslconfssl'] = "Cấu hình SSL";
$_LANG['sslnoconfigurationpossible'] = "Quá trình thiết lập / cài đặt đã hoàn tất. Nếu có bất kỳ vấn đề nào cần giải đáp, xin liên hệ với chúng tôi.";

$_LANG['adminloggedin'] = "Bạn đang đăng nhập bằng tài khoản admin.";
$_LANG['returntoadminarea'] = "Quay lại trang quản trị";
$_LANG['adminmasqueradingasclient'] = "Bạn đang đăng nhập dưới danh nghĩa khách hàng.";
$_LANG['logoutandreturntoadminarea'] = "Đăng xuất & quay lại trang quản trị";

$_LANG['supportAndUpdatesExpired'] = "Hỗ trợ & cập nhật đã hết hạn.";
$_LANG['supportAndUpdatesExpiredLicense'] = "Gói hỗ trợ & cập nhật đi kèm với dịch vụ đã hết hạn";
$_LANG['supportAndUpdatesRenewalRequired'] = "Để truy cập vào trung tâm hỗ trợ & cập nhật bạn cần gia hạn dịch vụ.";
$_LANG['supportAndUpdatesClickHereToRenew'] = "Bấm vào đây để gia hạn";

$_LANG['pwresetemailneeded'] = "Quý khách quên mật khẩu ? Xin vui lòng điền địa chỉ Email vào ô dưới đây để yêu cầu lấy lại mật khẩu.";

$_LANG['quotestageexpired'] = "Đã hết hạn";

$_LANG['ticketinfo'] = "Thông tin Ticket";
$_LANG['customfield'] = "Custom Fields";

$_LANG['domainsActive'] = "Đang sử dụng";
$_LANG['domainsExpired'] = "Đã hết hạn";
$_LANG['domainsCancelled'] = "Đã hủy";
$_LANG['domainsFraud'] = "Fraud";
$_LANG['domainsPending'] = "Chưa kích hoạt";
$_LANG['domainsPendingTransfer'] = "Đang chuyển";
$_LANG['domainsExpiringInTheNext30Days'] = "Hết hạn trong 30 ngày";
$_LANG['domainsExpiringInTheNext90Days'] = "Hết hạn trong 90 ngày";
$_LANG['domainsExpiringInTheNext180Days'] = "Hết hạn trong 180 ngày";
$_LANG['domainsExpiringInMoreThan180Days'] = "Hết hạn sau 180 ngày";

$_LANG['kbtagcloud'] = "Tag Cloud";

$_LANG['cancellationrequestedexplanation'] = "Sản phẩm / dịch vụ này đang trong quá trình hủy";
$_LANG['cancellationrequested'] = "Đã gửi yêu cầu hủy dịch vụ";

$_LANG['yourrecenttickets'] = "Ticket mới gửi";

$_LANG['domains']['deTermsDescription1'] = "To register a new domain, transfer or change registrant information the registrant must explicitly accept the .DE terms and conditions.";
$_LANG['domains']['deTermsDescription2'] = "(See full text of .de terms and conditions: http://www.denic.de/en/bedingungen.html.)";
$_LANG['directDebitPageTitle'] = "Direct Debit Payment";
$_LANG['directDebitHeader'] = "Direct Debit Payment";
$_LANG['directDebitErrorNoBankName'] = "Quý khách vui lòng nhập tên ngân hàng";
$_LANG['directDebitErrorAccountType'] = "Quý khách vui lòng nhập loại tài khoản ngân hàng";
$_LANG['directDebitErrorNoABA'] = "You must enter your banks ABA code";
$_LANG['directDebitErrorAccNumber'] = "You must enter your bank account number";
$_LANG['directDebitErrorConfirmAccNumber'] = "You must confirm your bank account number";
$_LANG['directDebitErrorAccNumberMismatch'] = "Your bank account number & confirmation don't match";
$_LANG['directDebitThanks'] = "Thank you for submitting your details. We will attempt to process your payment using the supplied details within the next few days, and contact you in case of any problems.";
$_LANG['directDebitPleaseSubmit'] = "Please submit your bank account details below to pay by Direct Debit.";
$_LANG['directDebitBankName'] = "Tên ngân hàng";
$_LANG['directDebitAccountType'] = "Loại tài khoản ngân hàng";
$_LANG['directDebitABA'] = "Bank ABA Code";
$_LANG['directDebitAccNumber'] = "Số tài khoản ngân hàng";
$_LANG['directDebitConfirmAccNumber'] = "Xác nhận số tài khoản ngân hàng";
$_LANG['directDebitSubmit'] = "Gửi";
$_LANG['directDebitChecking'] = "Checking";
$_LANG['directDebitSavings'] = "Savings";

$_LANG['outOfStockProductRemoved'] = "An out of stock product was automatically removed from the cart";

$_LANG['subaccountpermsquotes'] = "Xem báo giá";

$_LANG['chooselanguage'] = "Ngôn ngữ";

$_LANG['success'] = "Thành công";
$_LANG['error'] = "Lỗi";
$_LANG['print'] = "In";
$_LANG['invoicelineitems'] = "Invoice Items";

$_LANG['quotelineitems'] = "Quote Items";

$_LANG['quoteproposal'] = "Đề xuất";
$_LANG['quoteacceptagreetos'] = "To accept the quote, please confirm your acceptance of our terms of service.";
$_LANG['quoteacceptcontractwarning'] = "Please be aware that accepting a quote is considered entering into a contract and you will not be able to cancel once accepted.";

// Client alerts
$_LANG['clientAlerts']['creditCardExpiring'] = "Thẻ tín dụng của quý khách :creditCardType-:creditCardLastFourDigits hết hạn trong vòng :days ngày.";
$_LANG['clientAlerts']['domainsExpiringSoon'] = "Quý khách có :numberOfDomains tên miền sắp hết hạn trong vòng :days ngày.";
$_LANG['clientAlerts']['invoicesUnpaid'] = "Quý khách có :numberOfInvoices hóa đơn chưa thanh toán.";
$_LANG['clientAlerts']['invoicesOverdue'] = "Quý khách có :numberOfInvoices hóa đơn quá hạn thanh toán với tổng số tiền là :balanceDue.";
$_LANG['clientAlerts']['creditBalance'] = "Số dư tài khoản :creditBalance.";

// Client homepage panels
$_LANG['clientHomePanels']['unpaidInvoices'] = "Hóa đơn chưa thanh toán";
$_LANG['clientHomePanels']['unpaidInvoicesMsg'] = "Quý khách có :numberOfInvoices hóa đơn chưa thanh toán với tổng số tiền cần thanh toán là :balanceDue.";
$_LANG['clientHomePanels']['overdueInvoices'] = "Hóa đơn quá hạn";
$_LANG['clientHomePanels']['overdueInvoicesMsg'] = "Quý khách có :numberOfInvoices hóa đơn quá hạn thanh toán với tổng số tiền cần thanh toán là :balanceDue.";
$_LANG['clientHomePanels']['domainsExpiringSoon'] = "Tên miền sắp hết hạn";
$_LANG['clientHomePanels']['domainsExpiringSoonMsg'] = "Quý khách có :numberOfDomains tên miền sắp hết hạn trong vòng :days ngày.";
$_LANG['clientHomePanels']['activeProductsServices'] = "Quản lý dịch vụ";
$_LANG['clientHomePanels']['activeProductsServicesNone'] = "Quý khách chưa có dịch vụ / sản phẩm nào đang kích hoạt. <a href=\"cart.php\">Hãy bắt đầu đăng ký một dịch vụ</a> ngay hôm nay và trải nghiệm sự khác biệt.";
$_LANG['clientHomePanels']['recentNews'] = "Thông báo mới";
$_LANG['clientHomePanels']['affiliateProgram'] = "Chia sẻ doanh thu";
$_LANG['clientHomePanels']['recentSupportTickets'] = "Ticket mới gửi";
$_LANG['clientHomePanels']['recentSupportTicketsNone'] = "Quý khách chưa gửi Ticket nào. Nếu có bất kỳ thắc mắc hoặc vấn đề cần hỗ trợ hãy <a href=\"submitticket.php\">mở ticket</a> để chúng tôi được phục vụ.";
$_LANG['clientHomePanels']['affiliateSummary'] = "Số dư tài khoản Affilate của bạn là :commissionBalance. Bạn có thể rút tiền hoa hồng khi số dư đạt :amountUntilWithdrawalLevel.";

$_LANG['upgradeNotPossible'] = "Sản phẩm này không thể nâng cấp. Vui lòng liên hệ bộ phận hỗ trợ để biết thêm chi tiết.";

$_LANG['hostingInfo'] = "Thông tin Hosting";
$_LANG['additionalInfo'] = "Thông tin bổ sung";
$_LANG['resourceUsage'] = "Tài nguyên sử dụng";
$_LANG['primaryIP'] = "IP chính";
$_LANG['assignedIPs'] = "Các địa chỉ IP gắn thêm";
$_LANG['diskSpace'] = "Dung lượng";
$_LANG['bandwidth'] = "Băng thông";
$_LANG['registered'] = "Đã đăng ký";
$_LANG['upgrade'] = "Nâng cấp";

$_LANG['downdoadsdesc'] = "Hướng dẫn sử dụng, phần mềm hỗ trợ, và các tài nguyên khác";

$_LANG['doToday'] = "Điều hướng nhanh";
$_LANG['changeDomainNS'] = "Thay đổi Nameservers cho tên miền này";
$_LANG['updateWhoisContact'] = "Cập nhật thông tin WHOIS cho tên miền này";
$_LANG['changeRegLock'] = "Thay đổi trạng thái Registrar Lock cho tên miền này";
$_LANG['renewYourDomain'] = "Gia hạn tên miền";

$_LANG['oops'] = "Oops";
$_LANG['goback'] = "Quay lại";
$_LANG['returnhome'] = "Về trang chủ";
$_LANG['blankCustomField'] = "(không có giá trị)";

$_LANG['viewAll'] = "Hiển thị tất cả";
$_LANG['moreDetails'] = "Xem thêm";

$_LANG['clientHomeSearchKb'] = "Tìm kiếm các vấn đề / câu hỏi thường gặp ...";

$_LANG['whoisContactWarning'] = "Chúng tôi khuyến cáo quý khách hàng cập nhật thông tin WHOIS tên miền tại bất kỳ thời điểm nảo để tránh việc bị mất quyền kiểm soát tên miền.";

$_LANG['paymentstodate'] = "Payments to Date";
$_LANG['balancedue'] = "Số tiền cần thanh toán";
$_LANG['submitpayment'] = "Thực hiện thanh toán";

$_LANG['domaincheckeravailable'] = "Chưa đăng ký";
$_LANG['domaincheckertransferable'] = "Sẵn sàng để chuyển tên miền";
$_LANG['domaincheckertaken'] = "Đã đăng ký";
$_LANG['domaincheckeradding'] = "Đang thêm vào giỏ hàng";
$_LANG['domaincheckeradded'] = "Đã thêm vào giỏ hàng";
$_LANG['domaincheckernomoresuggestions'] = "That's all the results we have for you! If you still haven't found what you're looking for, please try a different search term or keyword.";
$_LANG['domaincheckerunabletooffertld'] = "Unfortunately we are unable to register this TLD at this time";
$_LANG['domaincheckerbulkplaceholder'] = "Nhập tối đa 20 tên miền quý khách muốn đăng ký vào đây.\nMỗi tên miền một dòng.\nKhông bao gồm http:// hoặc www\n\Ví dụ:\nexample.com\nexample.net";

$_LANG['domainchecker']['suggestiontakentitle'] = "Tên miền không có sẵn";
$_LANG['domainchecker']['suggestiontakenmsg'] = "Unfortunately the domain you selected is unavailable. This can sometimes occur if the domain has been registered recently. Please go back and choose another domain.";
$_LANG['domainchecker']['suggestiontakenchooseanother'] = "Chọn tên miền khác";

$_LANG['domainchecker']['alreadyincarttitle'] = "Đã tồn tại trong giỏ hàng";
$_LANG['domainchecker']['alreadyincartmsg'] = "Tên miền này đã tồn tại trong giỏ hàng. Tiến hành thanh toán để hoàn thành đơn hàng này.";
$_LANG['domainchecker']['alreadyincartcheckoutnow'] = "Thanh toán ngay";

$_LANG['genericerror']['title'] = "Oops, có lỗi xảy ra!";
$_LANG['genericerror']['msg'] = "Vui lòng thử lại. Nếu vấn đề vẫn xảy ra, vui lòng liên hệ với bộ phận hỗ trợ.";

# Licensing Addon

$_LANG['licensingaddon']['mylicenses'] = "Quản lý bản quyền";
$_LANG['licensingaddon']['latestdownload'] = "Tải về phiên bản mới nhất";
$_LANG['licensingaddon']['downloadnow'] = "Tải về";
$_LANG['licensingaddon']['licensekey'] = "Mã bản quyền";
$_LANG['licensingaddon']['validdomains'] = "Tên miền khả dụng";
$_LANG['licensingaddon']['validips'] = "Các địa chỉ IP khả dụng";
$_LANG['licensingaddon']['validdirectory'] = "Thư mục khả dụng";
$_LANG['licensingaddon']['status'] = "Tình trạng bản quyền";
$_LANG['licensingaddon']['reissue'] = "Cấp lại";
$_LANG['licensingaddon']['reissuestatusmsg'] = "Tên miền, địa chỉ IP, thư mục cài đặt module sẽ được tự động phát hiện và cập nhật khi cài đặt.";

$_LANG['affiliateWithdrawalSummary'] = "Số tiền hoa hồng của bạn phải đạt :amountForWithdrawal mới có thể rút ra hoặc sử dụng.";

$_LANG['projectManagement']['activeProjects'] = "Dự án của bạn";

# cPanel Module

$_LANG['cPanel']['packageDomain'] = "Gói dịch vụ / Tên miền";
$_LANG['cPanel']['addonsExtras'] = "Dịch vụ bổ sung";
$_LANG['cPanel']['purchaseActivate'] = "Đặt hàng & Kích hoạt";

$_LANG['cPanel']['usageStats'] = "Thống kê";
$_LANG['cPanel']['diskUsage'] = "Dung lượng sử dụng";
$_LANG['cPanel']['bandwidthUsage'] = "Băng thông sử dụng";
$_LANG['cPanel']['usageStatsBwLimitNear'] = "Băng thông của bạn sắp hết.";
$_LANG['cPanel']['usageStatsDiskLimitNear'] = "Dung lượng ổ cứng của bạn sắp đầy.";
$_LANG['cPanel']['usageUpgradeNow'] = "Cập nhật ngay";
$_LANG['cPanel']['usageLastUpdated'] = "Cập nhật lúc";

$_LANG['cPanel']['quickShortcuts'] = "Liên kết nhanh";
$_LANG['cPanel']['emailAccounts'] = "Tài khoản Email";
$_LANG['cPanel']['forwarders'] = "Forwarders";
$_LANG['cPanel']['autoresponders'] = "Autoresponders";
$_LANG['cPanel']['fileManager'] = "Quản lý File";
$_LANG['cPanel']['backup'] = "Sao lưu";
$_LANG['cPanel']['subdomains'] = "Subdomains";
$_LANG['cPanel']['addonDomains'] = "Addon Domains";
$_LANG['cPanel']['cronJobs'] = "Cron Jobs";
$_LANG['cPanel']['mysqlDatabases'] = "Quản lý CSDL";
$_LANG['cPanel']['phpMyAdmin'] = "phpMyAdmin";
$_LANG['cPanel']['awstats'] = "Thống kê";

$_LANG['cPanel']['createEmailAccount'] = "Tạo nhanh tài khoản Email";
$_LANG['cPanel']['usernamePlaceholder'] = "tên";
$_LANG['cPanel']['passwordPlaceholder'] = "Mật khẩu";
$_LANG['cPanel']['create'] = "Tạo";
$_LANG['cPanel']['emailAccountCreateSuccess'] = "Tài khoản Email đã được tạo thành công!";
$_LANG['cPanel']['emailAccountCreateFailed'] = "Tạo tài khoản Email không thành công: ";

$_LANG['cPanel']['packageNotActive'] = "This hosting package is currently";
$_LANG['cPanel']['statusPendingNotice'] = "Bạn không thể bắt đầu sử dụng dịch vụ này cho đến khi được kích hoạt.";
$_LANG['cPanel']['statusSuspendedNotice'] = "Bạn không thể tiếp tục sử dụng và quản lý gói dịch vụ này cho đến khi được kích hoạt lại.";

$_LANG['cPanel']['billingOverview'] = "Chi tiết thanh toán";

$_LANG['liveHelp']['chatNow'] = "Chat với chúng tôi";

$_LANG['quotes'] = "Báo giá";

$_LANG['productMustBeActiveForModuleCmds'] = "Sản phẩm / Dịch vụ cần được kích hoạt để thực hiện hành động này";
$_LANG['domainCannotBeManagedUnlessActive'] = "Tên miền cần được kích hoạt để thực hiện hành động này.";

$_LANG['actionRequiresAtLeastOneDomainSelected'] = 'Vui lòng chọn ít nhất một tên miền để thực hiện hành động này.';

$_LANG['clientAreaProductDownloadsAvailable'] = "Các tài nguyên khả dụng với sản phẩm / dịch vụ của bạn";
$_LANG['clientAreaProductAddonsAvailable'] = "Các dịch vụ bổ sung khả dụng với sản phẩm / dịch vụ của bạn. <a href=\"cart.php?gid=addons\">Xem thêm &amp; order &raquo;</a>";
$_LANG['clientAreaSecurityTwoFactorAuthRecommendation'] = "Với xác minh 2 bước, bạn sẽ bảo vệ tài khoản của mình bằng cả mật khẩu và điện thoại";
$_LANG['clientAreaSecurityNoSecurityQuestions'] = "Setting a security question and answer helps protect your account from unauthorized password resets and allows us to verify your identity when requesting account changes.";
$_LANG['clientAreaSecuritySecurityQuestionOtherError'] = "Việc đặt câu hỏi bí mật giúp chúng tôi nhận diện bạn là chủ nhân của tài khoản khi cần bạn cần thay đổi thông tin.";

# Custom Phrases
$_LANG['wiretransfer_instruction'] = " liên hệ $tenweb "; // hình thức thanh toán


$_LANG['from'] = "Từ";
$_LANG['featuredProduct'] = "Đăng Ký Nhiều";
$_LANG['shoppingCartProductPerMonth'] = "<span>:price</span>/Tháng";
$_LANG['shoppingCartProductPerYear'] = "<span>:price</span>/Năm";



// Markdown Editor Help
$_LANG['markdown']['title']= "Markdown Guide";
$_LANG['markdown']['emphasis']= "Emphasis";
$_LANG['markdown']['bold']= "bold";
$_LANG['markdown']['italics']= "italics";
$_LANG['markdown']['strikeThrough']= "strikethrough";
$_LANG['markdown']['headers']= "Headers";
$_LANG['markdown']['bigHeader']= "Big header";
$_LANG['markdown']['mediumHeader']= "Medium header";
$_LANG['markdown']['smallHeader']= "Small header";
$_LANG['markdown']['tinyHeader']= "Tiny header";
$_LANG['markdown']['lists']= "Lists";
$_LANG['markdown']['genericListItem']= "Generic list item";
$_LANG['markdown']['numberedListItem']= "Numbered list item";
$_LANG['markdown']['links']= "Links";
$_LANG['markdown']['textToDisplay']= "Text to display";
$_LANG['markdown']['exampleLink']= "http://www.example.com";
$_LANG['markdown']['quotes']= "Quotes";
$_LANG['markdown']['thisIsAQuote']= "This is a quote.";
$_LANG['markdown']['quoteMultipleLines']= "It can span multiple lines!";
$_LANG['markdown']['tables']= "Tables";
$_LANG['markdown']['columnOne']= "Column 1";
$_LANG['markdown']['columnTwo']= "Column 2";
$_LANG['markdown']['columnThree']= "Column 3";
$_LANG['markdown']['withoutAligning']= "Or without aligning the columns...";
$_LANG['markdown']['john']= "John";
$_LANG['markdown']['doe']= "Doe";
$_LANG['markdown']['male']= "Male";
$_LANG['markdown']['mary']= "Mary";
$_LANG['markdown']['smith']= "Smith";
$_LANG['markdown']['female'] = "Female";
$_LANG['markdown']['displayingCode'] = "Displaying code";
$_LANG['markdown']['spanningMultipleLines'] = "Or spanning multiple lines...";
$_LANG['markdown']['saved'] = "saved";
$_LANG['markdown']['saving'] = "autosaving";

$_LANG['oauth']['authoriseAppToAccess'] = "Authorise :appName<br />to access your account?";
$_LANG['oauth']['willBeAbleTo'] = "This application will be able to";
$_LANG['oauth']['authorise'] = "Authorise";
$_LANG['oauth']['currentlyLoggedInAs'] = "You are currently logged in as :firstName :lastName";
$_LANG['oauth']['notYou'] = "Not You?";
$_LANG['oauth']['returnToApp'] = "Return to :appName";
$_LANG['oauth']['copyrightFooter'] = "Copyright &copy; :dateYear :companyName. All Rights Reserved.";
$_LANG['oauth']['loginToGrantApp'] = "Login to grant :appName<br />access to your account";
$_LANG['oauth']['redirectDescriptionOne'] = "Redirecting you back to the application. This may take a few moments.";
$_LANG['oauth']['redirectDescriptionTwo'] = "If your browser doesn't redirect you, please";
$_LANG['oauth']['redirectDescriptionThree'] = "click here to continue";
$_LANG['downloadLoginRequiredTagline'] = "Please login to access the requested file download";

$_LANG['orderForm']['year'] = "Year";
$_LANG['orderForm']['years'] = "Years";
$_LANG['orderForm']['domainOrKeyword'] = "Enter a domain or keyword";
$_LANG['orderForm']['searching'] = "Searching";
$_LANG['orderForm']['domainIsUnavailable'] = "<strong>:domain</strong> Đã được đăng ký"; //Strong tag is required here
$_LANG['orderForm']['add'] = "Add";
$_LANG['orderForm']['suggestedDomains'] = "Suggested Domains";
$_LANG['orderForm']['generatingSuggestions'] = "Generating suggestions for you";
$_LANG['orderForm']['addHosting'] = "Đăng ký thêm hosting";
$_LANG['orderForm']['chooseFromRange'] = "Xem thêm các gói và chương trình khuyến mãi";
$_LANG['orderForm']['packagesForBudget'] = "Đăng ký hosting miễn phí ngay với tên miền .vn";
$_LANG['orderForm']['exploreNow'] = "Đăng ký hosting";
$_LANG['orderForm']['transferToUs'] = "Chuyển tên miền về $tenweb";
$_LANG['orderForm']['transferExtend'] = "Miễn phí chuyển tên miền về $tenweb";
$_LANG['orderForm']['transferDomain'] = "Chuyển tên miền ";
$_LANG['orderForm']['extendExclusions'] = "Miễn phí Hosting khi chuyển về $tenweb";
$_LANG['orderForm']['singleTransfer'] = "Single domain transfer";
$_LANG['orderForm']['enterDomain'] = "Please enter your domain";
$_LANG['orderForm']['authCode'] = "Authorization Code";
$_LANG['orderForm']['authCodePlaceholder'] = "Epp Code / Auth Code";
$_LANG['orderForm']['authCodeTooltip'] = "To initiate a transfer you will need to obtain the authorization code from your current registrar. These can often be referred to as either the epp code or auth code. They act as a password and are unique to the domain name.";
$_LANG['orderForm']['help'] = "Help";
$_LANG['orderForm']['required'] = "Required";

$_LANG['orderForm']['checkingAvailability'] = 'Checking availability';
$_LANG['orderForm']['verifyingTransferEligibility'] = 'Verifying transfer eligibility';
$_LANG['orderForm']['verifyingDomain'] = 'Verifying your domain selection';
$_LANG['orderForm']['transferEligible'] = 'Your domain is eligible for transfer';
$_LANG['orderForm']['transferUnlockBeforeContinuing'] = 'Please ensure you have unlocked your domain at your current registrar before continuing.';
$_LANG['orderForm']['transferNotEligible'] = 'Not Eligible for Transfer';
$_LANG['orderForm']['transferNotRegistered'] = 'The domain you entered does not appear to be registered.';
$_LANG['orderForm']['trasnferRecentlyRegistered'] = 'If the domain was registered recently, you may need to try again later.';
$_LANG['orderForm']['transferAlternativelyRegister'] = 'Alternatively, you can perform a search to register this domain.';
$_LANG['orderForm']['domainInvalid'] = 'Invalid domain name provided';
$_LANG['orderForm']['domainInvalidCheckEntry'] = 'Please check your entry and try again.';
$_LANG['orderForm']['domainPriceRegisterLabel'] = 'Continue to register this domain for';
$_LANG['orderForm']['domainPriceTransferLabel'] = 'Transfer to us and extend by 1 year* for';

$_LANG['change'] = "Change";

$_LANG['filemanagement']['nofileuploaded'] = "No file uploaded.";
$_LANG['filemanagement']['invalidname'] = "Valid filenames contain only alpha-numeric, dot, hyphen and underscore characters.";
$_LANG['filemanagement']['couldNotSaveFile'] = "Could not save uploaded file.";
$_LANG['filemanagement']['checkPermissions'] = "Please check permissions.";
$_LANG['filemanagement']['checkAvailableDiskSpace'] = "Please check available disk space.";
$_LANG['filemanagement']['fileAlreadyExists'] = "File already exists.";
$_LANG['filemanagement']['noUniqueName'] = "Unable to find a unique filename.";

$_LANG['cartSimpleCaptcha'] = "Please enter the code shown below";

$_LANG['clientHomePanels']['showingRecent100'] = "Showing the most recent 100 records";
$_LANG['orderForm']['domainLetterOrNumber'] = "Domains must begin with a letter or a number";
$_LANG['orderForm']['domainLengthRequirements'] = " and be between <span class=\"min-length\"></span> and <span class=\"max-length\"></span> characters in length";

$_LANG['clientareatransferredaway'] = "Transferred Away";
$_LANG['clientareacompleted'] = "Completed";
$_LANG['domainContactUs'] = "Contact Us";

$_LANG['orderForm']['shortPerYear'] = "/:yearsyr";
$_LANG['orderForm']['shortPerYears'] = "/:yearsyrs";

$_LANG['domainCheckerSalesGroup']['sale'] = "Sale";
$_LANG['domainCheckerSalesGroup']['hot'] = "Hot";
$_LANG['domainCheckerSalesGroup']['new'] = "New";

$_LANG['pricing']['browseExtByCategory'] = "Bảng giá tên miền";
$_LANG['pricing']['register'] = "New Price";
$_LANG['pricing']['transfer'] = "Transfer";
$_LANG['pricing']['renewal'] = "Renewal";
$_LANG['pricing']['selectExtCategory'] = "Please choose a category from above.";

$_LANG['navStore'] = "Dịch Vụ";
$_LANG['navBrowseProductsServices'] = "Tất cả dịch vụ";
$_LANG['browseProducts'] = "Tìm hiểu thêm";
$_LANG['navWebsiteSecurity'] = "Website & Security";
$_LANG['navMarketConnectService']['symantec'] = "SSL Certificates";
$_LANG['navMarketConnectService']['weebly'] = "Website Builder";
$_LANG['navMarketConnectService']['spamexperts'] = "E-mail Services";

$_LANG['store']['emailServices']['title'] = "E-mail Services";
$_LANG['store']['ssl']['title'] = "SSL Certificates";
$_LANG['store']['ssl']['dv']['title'] = "Domain Validated SSL";
$_LANG['store']['ssl']['ov']['title'] = "Organization Validation SSL";
$_LANG['store']['ssl']['ev']['title'] = "Extended Validation SSL";
$_LANG['store']['ssl']['wildcard']['title'] = "Wildcard SSL";
$_LANG['store']['websiteBuilder']['title'] = "Website Builder";
$_LANG['store']['configure']['configureProduct'] = "Configure Product";

$_LANG['store']['ssl']['dv']['tagline'] = "Secure your website in just a few minutes!";
$_LANG['store']['ssl']['dv']['descriptionTitle'] = "What is Standard DV SSL?";
$_LANG['store']['ssl']['dv']['descriptionContent'] = "<p>Domain Validation certificates offer an economical and quick way to implement SSL to your website. Domain Validated certificates verify you own the domain, but do not perform any additional organization level validation.</p><p>Domain Validated certificates are ideal for personal websites, blogs and social media, or any sites that are not transmitting private and confidential information.  A Domain Validated certificate activates the browser padlock and enables the use of https to assure your website visitors and customers that you take their privacy seriously.</p>";

$_LANG['store']['ssl']['ov']['tagline'] = "High assurance SSL shows website visitors your authenticated identity";
$_LANG['store']['ssl']['ov']['descriptionTitle'] = "What is Organization Validation SSL?";
$_LANG['store']['ssl']['ov']['descriptionContent'] = "<p>Organization Validated SSL Certificates provide instant identity confirmation and strong SSL protection for your website and business.</p><p>OV SSL is an organization validated certificate that gives your website a step up in credibility over domain validated SSL Certificates. It activates the browser padlock and https, shows your corporate identity, and assures your customers that you take security very seriously. Site visitors can verify that the website is operated by a legitimate company and is not an imposter site.</p>";

$_LANG['store']['ssl']['ev']['tagline'] = "Activate the green address bar for the highest trust and conversions";
$_LANG['store']['ssl']['ev']['descriptionTitle'] = "What is Extended Validation SSL?";
$_LANG['store']['ssl']['ev']['descriptionContent'] = "<p>EV SSL is an Extended Validation Certificate, the highest class of SSL available today and gives more credibility and trust to your website compared to using an organization or domain validated SSL Certificate.</p><p>Extended Validation SSL activates the green address bar and displays your company or organization name in the browser address bar. These prominent visual security indicators let visitors know that extra steps were taken to confirm the site they're visiting, increasing user trust in your website and its credibility – this is why most large companies and organizations choose EV certificates.</p>";

$_LANG['store']['ssl']['wildcard']['tagline'] = "Secure unlimited subdomains on a single certificate.";
$_LANG['store']['ssl']['wildcard']['descriptionTitle'] = "What is a Wildcard SSL Certificate?";
$_LANG['store']['ssl']['wildcard']['descriptionContent'] = "<p>Wildcard SSL allows you to secure an unlimited number of subdomains on a single certificate. It’s a great solution for anyone who hosts or manages multiple sites or pages that exist on the same domain. The one-time cost of the certificate covers you for additional subdomains you may add in the future.</p><p>Unlike a standard SSL Certificate that is issued to a single Fully Qualified Domain Name only, e.g. www.yourdomain.com, which means it can only be used to secure the exact domain to which it has been issued, a Wildcard SSL Certificate is issued to *.yourdomain.com, where the asterisk represents all possible subdomains.</p><p>Wildcard SSL is an option available for DV and OV SSL Certificates.</p>";

$_LANG['store']['websiteBuilder']['headline'] = "Building a Website Has Never Been Easier";
$_LANG['store']['websiteBuilder']['tagline'] = "Create the perfect site with powerful drag and drop tools";
$_LANG['store']['websiteBuilder']['introduction'] = "Weebly’s drag and drop website builder makes it easy to create a powerful, professional website without any technical skills. Over 40 million entrepreneurs and small businesses have already used Weebly to build their online presence with a website, blog or store.";

$_LANG['store']['emailServices']['headline'] = "Email Security, Built for You";
$_LANG['store']['emailServices']['tagline'] = "Take back control of your inbox";
$_LANG['store']['emailServices']['blockSpamHeadline'] = "Block nearly 100% of viruses, malware and spam before they ever reach your inbox";

$_LANG['navManageSsl'] = "Manage SSL Certificates";

$_LANG['invoicesPaymentPending'] = "Đang chờ thanh toán";

$_LANG['ssl']['changeApproverEmail'] = "Change Approver Email";
$_LANG['ssl']['reissueCertificate'] = "Reissue Certificate";
$_LANG['ssl']['retrieveCertificate'] = "Retrieve Certificate";

$_LANG['upgradeCredit'] = "Upgrade Credit";
$_LANG['upgradeCreditDescription'] = "Calculation based on :daysRemaining unused days of :totalDays totals days in the current billing cycle.";

$_LANG['orderForm']['domainExtensionTransferNotSupported'] = "Your domain is not supported for transfer to us at this time. Please try another domain.";
$_LANG['orderForm']['domainExtensionTransferPricingNotConfigured'] = "Your domain is not eligible for transfer to us. Please try another domain.";

////////// End of english language file.  Do not place any translation strings below this line!
$_LANG['showMenu'] = "Tất Cả Dịch Vụ";
$_LANG['hideMenu'] = "Ẩn Menu";

$_LANG['from'] = "Từ";
$_LANG['orderForm']['findNewDomain'] = "Find your new domain name. Enter your name or keywords below to check availability.";
$_LANG['orderForm']['transferExistingDomain'] = "Transfer your existing domain names to us and save.";
$_LANG['orderForm']['www'] = "www.";
$_LANG['orderForm']['check'] = "Kiểm tra";
$_LANG['orderForm']['returnToClientArea'] = "Trở lại Khu vực Khách hàng";
$_LANG['orderForm']['checkout'] = "Thanh toán";
$_LANG['orderForm']['alreadyRegistered'] = "Đăng Nhập Thành Viên";
$_LANG['orderForm']['createAccount'] = "Tạo tài khoản mới";
$_LANG['orderForm']['enterPersonalDetails'] = "Vui lòng Điền thông tin cá nhân và thông tin liên hệ.";
$_LANG['orderForm']['correctErrors'] = "Vui lòng sửa các lỗi sau trước khi tiếp tục";
$_LANG['orderForm']['existingCustomerLogin'] = "Khách hàng này đã tồn tại";
$_LANG['orderForm']['emailAddress'] = "Email của bạn";
$_LANG['orderForm']['personalInformation'] = "Thông tin khách hàng";
$_LANG['orderForm']['firstName'] = "Họ";
$_LANG['orderForm']['lastName'] = "Tên";
$_LANG['orderForm']['phoneNumber'] = "Số điện thoại";
$_LANG['orderForm']['billingAddress'] = "Thông tin thanh toán";
$_LANG['orderForm']['companyName'] = "Công ty";
$_LANG['orderForm']['optional'] = "Có thể bỏ trống";
$_LANG['orderForm']['streetAddress'] = "Số nhà tên đường";
$_LANG['orderForm']['streetAddress2'] = "Địa chỉ khác";
$_LANG['orderForm']['city'] = "Phường - Xã";
$_LANG['orderForm']['state'] = "Thành Phố";
$_LANG['orderForm']['country'] = "Country";
$_LANG['orderForm']['postcode'] = "Mã bưu điện";
$_LANG['orderForm']['domainAlternativeContact'] = "Bạn có thể chỉ định chi tiết liên hệ đã đăng ký thay thế cho (các) đăng ký miền trong đơn đặt hàng của mình khi đặt hàng thay mặt cho một cá nhân hoặc tổ chức khác. Nếu bạn không yêu cầu, bạn có thể bỏ qua phần này.";
$_LANG['orderForm']['accountSecurity'] = "Nhập mật khẩu cho tài khoản";
$_LANG['orderForm']['mediumStrength'] = "Medium Strength";
$_LANG['orderForm']['paymentDetails'] = "Chi tiết thanh toán";
$_LANG['orderForm']['preferredPaymentMethod'] = "Vui lòng chọn phương thức thanh toán phù hợp với bạn.";
$_LANG['orderForm']['cardNumber'] = "Card Number";
$_LANG['orderForm']['cvv'] = "CVV Security Number";
$_LANG['orderForm']['additionalNotes'] = "Ghi chú thêm";
$_LANG['orderForm']['continueToClientArea'] = "Continue To Client Area";
$_LANG['orderForm']['reviewDomainAndAddons'] = "Please review your domain name selections and any addons that are available for them.";
$_LANG['orderForm']['addToCart'] = "Add to Cart";
$_LANG['orderForm']['addedToCartRemove'] = "Added to Cart (Remove)";
$_LANG['orderForm']['configureDesiredOptions'] = "Cấu hình tùy chọn của Quý khách và tiếp tục ";
$_LANG['orderForm']['haveQuestionsContact'] = "Nếu Quý khách thắc mắc vấn đề hãy liên hệ nhân viên tư vấn";
$_LANG['orderForm']['haveQuestionsClickHere'] = "Click here";
$_LANG['orderForm']['use'] = "Đăng Ký";
$_LANG['orderForm']['check'] = "Kiểm tra";
$_LANG['orderForm']['transfer'] = "Chuyển Về";
$_LANG['orderForm']['domainAddedToCart'] = "This domain has been added to your cart.";
$_LANG['orderForm']['registerLongerAndSave'] = "Register for longer and save!";
$_LANG['orderForm']['tryRegisteringInstead'] = "Try registering this domain instead.";
$_LANG['orderForm']['domainAvailabilityCached'] = "Domain availability results are cached which may lead to recently registered domains being shown as available.";
$_LANG['orderForm']['submitTicket'] = "Tạo yêu cầu hỗ trợ";
$_LANG['orderForm']['promotionAccepted'] = "Mã khuyến mãi được chấp nhận! Tổng giá trị đơn đặt hàng của bạn đã được cập nhật.";
$_LANG['orderForm']['productOptions'] = "Dịch Vụ";
$_LANG['orderForm']['qty'] = "Số Lượng";
$_LANG['orderForm']['priceCycle'] = "Số Tiền";
$_LANG['orderForm']['edit'] = "Sửa";
$_LANG['orderForm']['update'] = "cập nhật";
$_LANG['orderForm']['remove'] = "Remove";
$_LANG['orderForm']['applyPromoCode'] = "Áp dụng mã khuyến mại";
$_LANG['orderForm']['estimateTaxes'] = "Estimate Taxes";
$_LANG['orderForm']['removePromotionCode'] = "Xóa mã khuyến mại";
$_LANG['orderForm']['updateTotals'] = "Cập nhật lại tất cả";
$_LANG['orderForm']['continueShopping'] = "Đặt thêm dịch vụ";
$_LANG['orderForm']['removeItem'] = "Xóa dịch vụ";
$_LANG['orderForm']['yes'] = "Yes";
$_LANG['orderForm']['cancel'] = "Hủy";
$_LANG['orderForm']['close'] = "Close";
$_LANG['orderForm']['totals'] = "Tổng";
$_LANG['orderForm']['includedWithPlans'] = "Thông tin chung cho tất cả các gói sản phẩm/dịch vụ";
$_LANG['orderForm']['whatIsIncluded'] = "What is Included?";
$_LANG['orderForm']['errorNoProductGroup'] = "Could not load any product groups.";
$_LANG['sso']['title'] = "Đăng nhập một lần bấm";
$_LANG['subaccountSsoDenied'] = "Bạn không có quyền đăng nhập bằng Đăng nhập một lần bấm.";
$_LANG['subaccountpermsproductsso'] = "Thực hiện Đăng nhập Một lần";
$_LANG['sso']['summary'] = "Các ứng dụng của bên thứ ba (ví dụ như đăng nhập từ Cpanel host) tận dụng chức năng Đăng nhập một lần để cung cấp quyền truy cập trực tiếp vào tài khoản trên trang web này của bạn mà không cần biết tài khoản mật khẩu tại web này và bạn không cần phải xác thực lại.";
$_LANG['sso']['enabled'] = "Tài khoản của bạn hiện đang bật tính năng đăng nhập một lần.";
$_LANG['sso']['disabled'] = "Tài khoản của bạn hiện đang tắt tính năng Đăng nhập một lần.";
$_LANG['permissions']['descriptions']['productsso'] = "Cho phép đăng nhập một lần vào các dịch vụ";
$_LANG['sso']['disablenotice'] = "Bạn có thể nên tắt chức năng này nếu bạn cung cấp quyền truy cập vào bất kỳ ứng dụng bên thứ ba nào của mình cho những người dùng mà bạn không muốn truy cập vào tài khoản thanh toán của mình.";
$_LANG['navAccountSecurity'] = "Bảo mật tài khoản";
$_LANG['navContacts'] = "Danh bạ";
$_LANG['navUserManagement'] = "Quản lý tài khoản";
$_LANG['navSwitchAccount'] = "Chọn tài khoản";
$_LANG['emailMarketing']['joinOurMailingList'] = "Tham gia danh sách gửi thư của chúng tôi";
$_LANG['newsletterremoved'] = "Bạn đã hủy đăng ký thành công khỏi danh sách gửi thư của chúng tôi.";
$_LANG['newslettersubscribed'] = "Bạn đã đăng ký thành công tham gia vào danh sách gửi thư của chúng tôi.";
$_LANG['emailMarketingAlreadyOptedIn'] = "Bạn đã đăng ký vào danh sách gửi thư của chúng tôi.";
$_LANG['emailMarketingAlreadyOptedOut'] = "Bạn đã được hủy đăng ký khỏi danh sách gửi thư của chúng tôi.";
$_LANG['invoicePaymentSuccessAwaitingNotify'] = "Cảm ơn bạn đã hoàn tất quá trình thanh toán. Chúng tôi đang chờ thông báo để xác nhận khoản thanh toán bạn vừa thực hiện. Chúng tôi sẽ gửi cho bạn email xác nhận ngay sau khi bạn nhận được thông báo này.";
$_LANG['domainautorenewinfo'] = "Tự động gia hạn giúp bảo vệ miền của bạn. Khi được kích hoạt, chúng tôi sẽ tự động gửi cho bạn hóa đơn gia hạn vài tuần trước khi miền của bạn hết hạn và việc gia hạn miền sẽ thành công.";












