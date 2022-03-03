@include('layouts.session')
@php
  $_COOKIE_DOMAIN=".digeam.com";
  SetCookie("return_url",base64_encode("https://www.digeam.com/event/20211008/index"),0,"/",$_COOKIE_DOMAIN);
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  minimum-scale=1.0">
    <meta name="title" content="digeam">
    <meta name="description" content="掘夢網是由一群遊戲的同好所創辦，他們憑著一股創業熱情，打造出夢想中的企業。">
    <meta name="keywords" content="digeam, 掘夢網">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="掘夢網"/>
    <meta property="og:description" content="掘夢網是由一群遊戲的同好所創辦，他們憑著一股創業熱情，打造出夢想中的企業。">
    <meta property="og:image" content="https://www.digeam.com/event/20211111/img/fb-share.jpg">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>DiGeam 掘夢網 - DiGeam嘉年華</title>
    <link rel="shortcut icon" href="/images/favicon.ico">
    <!----------------------Css---------------------->
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css?v=1.00">
    <link rel="stylesheet" type="text/css" href="css/rwd.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <script type="text/javascript">
        var userip;
    </script>
    @php
        if (!isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $userip_get = '0.0.0.0';
        } else {
            $userip_get = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
    @endphp
    <script>
        function comming() {
            alert('敬請期待');
        }
    </script>
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-PB8RXNM');
    </script>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PB8RXNM" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <form id="logout-form" action="{{ secure_url('/logout') }}" method="POST" style="display: none;">
    	<input type="hidden" name="return_url" id="return_url" value="@php echo base64_encode("https://www.digeam.com/event/20211008/index"); @endphp">
        {{ csrf_field() }}
    </form>
    @php
        if (!isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        } else {
            $find_blockip = \App\Model\read\BlockIP::where('ip', $userip_get)->first();
            if ($find_blockip['id']) {
                $ts1 = strtotime(date("Y-m-d H:i:s"));
                $ts2 = strtotime($find_blockip['created_at']);
                $diff = abs($ts1 - $ts2) / 3600;
                if($diff >= 1) {
                    \App\Model\write\BlockIP::where('ip', $userip_get)->delete();
                }
            }
        }
    @endphp
    @if ((\App\Model\read\BlockIP::where('ip', $userip_get)->count()) > 0)
        <script>alert('親愛的玩家您好，\n《掘夢網》資安機制偵測到您的帳號遭多次異常登入，\n為保障您的會員權益，我們將暫時凍結本帳號1小時。\n基於安全考量，建議您立即更改帳號密碼，以降低盜用風險。\n\n※※※更改密碼後，將自動解除封鎖的IP※※※');location.href='{{ secure_url('/blocking') }}';</script>
    @endif
    @if (Auth::check())
        @if ((\App\Model\read\BlockUser::where('user_id', Auth::user()->id)->count()) > 0)
          <script>alert('你的帳號已被封鎖!');document.getElementById('logout-form').submit();</script>
        @endif
    @endif
	<!--pop-->
	<div class="popup" id="pop-award">
        <div class="blacklayer"></div>
        <div class="popbg">
            <div class="pop_content">
                <h1 class="part-title pop-title">中獎名單</h1>
                <div class="pop_dec"></div>
                <a href="https://drive.google.com/file/d/1XF57KAVloQ3q_pQCJ4UvMEMnc-Lg26GG/view?usp=sharing" target="_blank"><button class="pop-download">中獎憑證下載</button></a>
                <div class="pop-award-box">
                    <div class="award-box-content">
                        <p class="award-box-word">
                            <span>※得獎通知將寄送至得獎者的註冊信箱</span><br>
                            請查收信件，並於7日內填寫機會中獎憑證並寄至客服信箱(cservice@digeam.com)<br>
                            應援加碼賞的Mycard點數序號會附於得獎通知中，請得獎者特別留意。
                        </p>  
                        <p class="award-box-word">
                            加碼賞兌換方式：<br>
                            序號兌換網址：<a href="https://My24.tw/yt0Yzw" target="_blank">https://My24.tw/yt0Yzw</a>
                            請於2021/12/31前兌換，序號兌換後點數將自動匯入MyCard會員帳號內。<br>
                             MyCard會員帳號內的點數可以透過掘夢網平台儲值轉點專區>「MyCard會員轉點」儲值至會員帳號。
                        </p>  
                    </div>
                    <table class="pop_table">
                        <thead>
                            <tr>
                                <th>中獎帳號</th>
                                <th>獎項</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--<tr>
                                <td>lin********6407</td>
                                <td>SteelSeries QcK Prism XL 電競滑鼠墊</td>
                            </tr>
                            <tr>
                                <td>Qax****45</td>
                                <td>SteelSeries QcK Prism XL 電競滑鼠墊</td>
                            </tr>
                            <tr>
                                <td>lin********6407</td>
                                <td>SteelSeries QcK Prism XL 電競滑鼠墊</td>
                            </tr>
                            <tr>
                                <td>lin********6407</td>
                                <td>SteelSeries QcK Prism XL 電競滑鼠墊</td>
                            </tr>
                            <tr>
                                <td>Qax****45</td>
                                <td>SteelSeries QcK Prism XL 電競滑鼠墊</td>
                            </tr>
                            <tr>
                                <td>Qax****45</td>
                                <td>SteelSeries QcK Prism XL 電競滑鼠墊</td>
                            </tr>
                            <tr>
                                <td>Qax****45</td>
                                <td>SteelSeries QcK Prism XL 電競滑鼠墊</td>
                            </tr>
                            <tr>
                                <td>Qax****45</td>
                                <td>SteelSeries QcK Prism XL 電競滑鼠墊</td>
                            </tr>
                            <tr>
                                <td>lin********6407</td>
                                <td>SteelSeries QcK Prism XL 電競滑鼠墊</td>
                            </tr>
                            <tr>
                                <td>lin********6407</td>
                                <td>SteelSeries QcK Prism XL 電競滑鼠墊</td>
                            </tr>-->
                        </tbody>
                </table>
                </div>
                <button class="popclose">關閉</button>
            </div>
        </div>
    </div>
    <div class="wrap">
        <div class="top">
            <a href="https://www.digeam.com/member/billing" target="_blank" class="topbtn">儲值中心</a>
            <a href="https://www.digeam.com/index" target="_blank" class="topbtn">前往掘夢網平台</a>
        </div>
        <div class="p0">
            <div class="logo">
                <a href="https://www.digeam.com/index" target="_blank">
                    <picture>
                        <source srcset="imgp/DG-logo.webp" type="imgp/webp">
                        <img  src="img/DG-logo.png">
                    </picture>
                </a>
            </div>
            <div class="p0_img">
                <div class="p0-1 p0-L"></div>
                <div class="p0-2  "></div>
                <div class="p0-3 "></div>
                <div class="p0-4 "></div>
                <div class="p0-5 "></div>
                <div class="p0-6 "></div>
                <div class="p0-7 "></div>
            </div>
            <div class="p0-light"></div>
            <div class="p0-title"></div>
            <button class="p0_btn" data-pop="pop-award"></button>
        </div>
        <div class="part">
            <div class="partbg-top"></div>
            <div class="partbg-side"></div>
            <div class="partbg-bottom"></div>
            <div class="p1">
                <h1 class="part-title">超嗨購盛典</h1>
                <h3 class="part-small-title">七大好康放肆送 </h3>
                <div class="part_dec-3"></div>
                <h4 class="big-word">瘋狂大放送～錯過這檔就不再有！</h4>
                <div class="content">
                    <p class="word">掘夢網「七」大遊戲超殺活動限時開啟！<br>
                        多樣商品特殺優惠，參加各項活動達成指定條件時，還有超值獎勵回饋！</p>
                </div>
                <div class="event-box">
                    <a href="https://9fo.digeam.com/event1110/" target="_blank">
                        <div class="event p1-1">
                            <picture>
                                <source srcset="imgp/p1-1-logo.webp" type="imgp/webp">
                                <img  src="img/p1-1-logo.png">
                            </picture>
                        </div>
                    </a>
                    <a href="https://54.digeam.com/event_1111/" target="_blank">
                        <div class="event p1-2">
                            <picture>
                                <source srcset="imgp/p1-2-logo.webp" type="imgp/webp">
                                <img  src="img/p1-2-logo.png">
                            </picture>
                        </div>
                    </a>
                    <a href="https://sro.digeam.com/event_1111/" target="_blank">
                        <div class="event p1-3">
                            <picture>
                                <source srcset="imgp/p1-3-logo.webp" type="imgp/webp">
                                <img  src="img/p1-3-logo.png">
                            </picture>
                        </div>
                    </a>
                    <a href="https://sya.digeam.com/event/20211111/" target="_blank">
                        <div class="event p1-4">
                            <picture>
                                <source srcset="imgp/p1-4-logo.webp" type="imgp/webp">
                                <img  src="img/p1-4-logo.png">
                            </picture>
                        </div>
                    </a>
                    <a href="https://go.digeam.com/1111spfeedback/" target="_blank">
                        <div class="event p1-5">
                            <picture>
                                <source srcset="imgp/p1-5-logo.webp" type="imgp/webp">
                                <img  src="img/p1-5-logo.png">
                            </picture>
                        </div>
                    </a>
                    <a href="https://flyff.digeam.com/1111spevent/" target="_blank">
                        <div class="event p1-6">
                            <picture>
                                <source srcset="imgp/p1-6-logo.webp" type="imgp/webp">
                                <img  src="img/p1-6-logo.png">
                            </picture>
                        </div>
                    </a>
                    <a href="https://ato.digeam.com/event_1111/" target="_blank">
                        <div class="event p1-7">
                            <picture>
                                <source srcset="imgp/p1-7-logo.webp" type="imgp/webp">
                                <img  src="img/p1-7-logo.png">
                            </picture>
                        </div>
                    </a>
                </div>
            </div>
            <div class="p2">
                <h1 class="part-title">夢夢應援秀</h1>
                <h3 class="part-small-title">夢幻好禮限時抽 </h3>
                <div class="part_dec-3"></div>
                <h4 class="big-word">2021/11/9(二) 12:00 ~ 2021/11/19(五) 23:59</h4>
                <div class="content">
                    <p class="word">活動期間內，於掘夢網各遊戲<span>“消費累積”</span><br>
                        (1)滿<span>1,111點</span>(含)以上,即可參加銀夢賞抽選<br>
                        (2)滿<span>11,111點</span>(含)以上,即可參加金夢賞抽選<br>
                        ★符合銀夢賞資格者，還可參加應援加碼賞抽選喔!★<br>
                        電競神品、遊戲神器等多樣高價獎品任你抽！試試手氣把握機會衝一波！ </p>
                    <p class="small-word">
                        舉例：夢兒於活動期間在《搞鬼Online》消費了1,200點，即符合銀夢賞抽選資格；<br>
                        隔天又在《武士傳奇Online》消費了10,000點，因兩天共累積消費12,000點，則又符合金夢賞抽選資格。<br> 
                        即，在本次活動結束時，夢兒皆可參加銀夢賞、金夢賞及應援加碼賞的抽選。 
                    </p>
                </div>
                <div class="award-bg">
                    <div class="award-title p2-1-title">
                        <h2>金夢賞</h2>
                    </div>
                    <div class="award-box-dec-1"></div>
                    <div class="award-box">
                        <div class="award">
                            <picture>
                                <source srcset="imgp/award-1.webp" type="imgp/webp">
                                <img  src="img/award-1.png">
                            </picture>
                            <p class="award-word">SteelSeries Apex 5<br>
                                電競鍵盤<br>
                                <span>10名</span></p>
                        </div>
                        <div class="award">
                            <picture>
                                <source srcset="imgp/award-2.webp" type="imgp/webp">
                                <img  src="img/award-2.png">
                            </picture>
                            <p class="award-word">iPad Pro/顏色隨機 <br>
                                (11吋 128GB)<br>
                                <span>2名</span></p>
                        </div>
                        <div class="award">
                            <picture>
                                <source srcset="imgp/award-3.webp" type="imgp/webp">
                                <img  src="img/award-3.png">
                            </picture>
                            <p class="award-word">PlayStation5<br>
                                (光碟版)<br>
                                <span>1名</span></p>
                        </div>
                        <div class="award">
                            <picture>
                                <source srcset="imgp/award-4.webp" type="imgp/webp">
                                <img  src="img/award-4.png">
                            </picture>
                            <p class="award-word">iPhone 13/顏色隨機 <br>
                                (Pro Max 256GB)<br>
                                <span>1名</span></p>
                        </div>
                    </div>
                    <div class="award-box-dec-2"></div>
                    <div class="award-title p2-2-title">
                        <h2>銀夢賞</h2>
                    </div>
                    <div class="award-box-dec-1"></div>
                    <div class="award-box">
                        <div class="award">
                            <picture>
                                <source srcset="imgp/award-5.webp" type="imgp/webp">
                                <img  src="img/award-5.png">
                            </picture>
                            <p class="award-word">SteelSeries QcK <br>
                                Prism XL 電競滑鼠墊<br>
                                <span>15名</span></p>
                        </div>
                        <div class="award">
                            <picture>
                                <source srcset="imgp/award-6.webp" type="imgp/webp">
                                <img  src="img/award-6.png">
                            </picture>
                            <p class="award-word">SteelSeries Arctis 3<br>
                                電競耳機<br>
                                <span>10名</span></p>
                        </div>
                        <div class="award">
                            <picture>
                                <source srcset="imgp/award-7.webp" type="imgp/webp">
                                <img  src="img/award-7.png">
                            </picture>
                            <p class="award-word">SteelSeries Rival 310<br>
                                電競滑鼠<br>
                                <span>10名</span></p>
                        </div>
                    </div>
                    <div class="award-box-dec-2"></div>
                    <div class="award-title p2-3-title">
                        <h2>應援加碼賞</h2>
                    </div>
                    <div class="award-box-dec-1"></div>
                    <div class="award-box">
                        <div class="award">
                            <picture>
                                <source srcset="imgp/award-8.webp" type="imgp/webp">
                                <img  src="img/award-8.png">
                            </picture>
                            <p class="award-word">MyCard 點數<br>
                                50點<br>
                                <span>10名</span></p>
                        </div>
                    </div>
                    <div class="award-box-dec-2"></div>
                </div>
            </div>
            <div class="p3">
                <h1 class="part-title">注意事項</h1>
                <div class="notice">
                    <ol class="notice-word">
                        <li>依政府振興五倍券使用規範內容，五倍券無法使用於遊戲點數儲值，請特別留意。 </li>
                        <li>活動一的活動規則及時間以各活動頁面公告之內容與注意事項為準，請詳閱各活動頁說明後再行參加。</li>
                        <li>活動二採活動期間內遊戲商城(《九封召喚》不包括「禮物卡」購買)及網頁商城累計消費的最終金額為活動資格判斷依據。</li>
                        <li>每一會員帳號僅限金夢賞、銀夢賞及應援加碼賞抽選資格各一次。</li>
                        <li>活動二之抽獎名單以2021/11/19(23：59)活動結束時間為依據；得獎名單將於活動結束後5個工作日內於本活動頁公告並寄送得獎通知至得獎者的註冊信箱。</li>
                        <li>活動二之獎品將以郵寄方式寄至得獎者指定地址，得獎者須於名單公布後，7日內填寫機會中獎憑證並寄至客服信箱(cservice@digeam.com)，經官方確認資料無誤後獎品將於5個工作日內寄出。</li>
                        <li>活動二之獎品寄送地址僅限台港澳地區，如地址不符合上述條件，恕無法寄出。</li>
                        <li>活動二之應援加碼賞獎項兌換方式將以MyCard官網公佈為準。</li>
                        <li>本活動為機會中獎活動，消費者參與活動不代表即可獲得特定獎品。</li>
                        <li>本活動所贈送之獎項均不得要求轉換、轉讓、折換現金或遊戲點數、道具、貨幣。</li>
                        <li>於參加本活動之同時，即視同同意本活動之活動辦法與注意事項之規範，及所有活動內容及獎品發送方式，掘夢網股份有限公司保有中止、解釋、變更活動的最終權利。</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
        <!--Footer-->
    <footer>
        <div class="footer-img">
            <img class="footer-logo" src="img/digeam-logo-footer.png">
            <img class="footer-logo" src="img/MyCard.png">
        </div>
        <!-- <ul class="corp-code">
            <li><a href="https://www.104.com.tw/company/1a2x6bkal7" target="_blank">工作機會</a></li>
            <li><a href="https://www.digeam.com/terms">服務條款</a></li>
            <li><a href="https://www.digeam.com/terms2">隱私條款</a></li>
        </ul> -->
        <p class="copyright">
            掘夢網股份有限公司 © 2021<br>
            Copyright © DiGeam Corporation. All Rights Reserved.
        </p>
    </footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
	@php
        if(isset($_SERVER['HTTP_USER_AGENT'])) {
            $ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
        } else {
            $ua = '';
        }
        if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0') !== false && strpos($ua, 'rv:11.0') !== false)) {
    @endphp
    <script type="text/javascript">
        document.documentElement.classList.add('no-webp');
    </script>
    @php
        } else {
    @endphp
    <script src="/js/webp-detect.js"></script>
    @php
        }
    @endphp
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>
</html>