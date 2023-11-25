
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Loan Lenders | Connector</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/jquery.countdown.css')}}">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('dist/css/custom.css?v=8')}}">
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}"><link rel="stylesheet" href="{{asset('plugins/dropzone/min/dropzone.min.css')}}"><link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}"><link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')}}">  <!-- jQuery -->
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('plugins/chart.js/Chart.js')}}"></script>
  <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
  <script>
    var existing_token = "dvzvj5meD1_51v7y-KeBD_:APA91bFGzFCHXBt7d8rvdf-zCPFXCenl9_-Klr56_7kPDoSPADy55_hukPch3OAvHyHTmWVIklvwwSahWJaEqd1LUu4BXM5L5q02QMjmmg9Gu9sw-3GMSuOITVFEQygB4AcHfzpLXXSC";
    var firebaseConfig = {
        messagingSenderId : "1015596936481",
        apiKey: "AIzaSyDrGclS8INjsKWf1JnlAvHdDHsLz1hRq7Y",
        projectId: "hoogmatic-and-loan-lenders-web",
        appId: "1:1015596936481:web:ae513a0d134170f4a46260",
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    messaging
        .requestPermission()
        .then(function () {
            if(existing_token != ""){
              messaging.token(existing_token);
              return existing_token;
            }else{
              return messaging.getToken();
            }
        })
        .then(function (token) {
          fetch("/index.php?path=user&method=set_web_token&token="+token, {
            method: "POST",
            body: JSON.stringify({
                token: token
            }),
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
            });
            // .then((response) => response.json())
            // .then((json) => console.log(json));
        })
        .catch(function (err) {
            console.log('Unable to get permission to notify.', err);
        });

    let enableForegroundNotification = true;
    messaging.onMessage(function (payload) {
        if (enableForegroundNotification) {
            showNotification(payload);
        }
    });

    function showNotification(payload) {
        console.log('Message received. ', payload);
        let title = payload.notification.title;
        let icon = payload.notification.image; 
        //this is a large image may take more time to show notifiction, replace with small size icon
        let body = payload.notification.body;
        let link = payload.data['gcm.notification.url'];
        let notification = new Notification(title, { body, icon });
        notification.onclick = () => {
          window.open(link);
          //notification.close();
        }
    }
  </script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img src="{{asset('dist/img/loading-buffering.gif')}}" alt="Loading" height="500" width="600">
        </div><div class="content-wrapper" style="min-height:59.406px;margin-left:auto;">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-4">
          Home ver:2
        </div>
        <div class="col-sm-4 text-center">
          <img src="https://hoogmatic.in/images/hm_logo.png" height="40px" alt="">
        </div>
        <div class="col-sm-4 text-right">
          <a data-target="grid-drop" class="text-dark" href="javascript:void(0)" id="grid-icon" role="button">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid" role="img" style="width:14px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-grid fa-lg">
              <path fill="currentColor" d="M0 72C0 49.9 17.9 32 40 32H88c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V72zM0 232c0-22.1 17.9-40 40-40H88c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V232zM128 392v48c0 22.1-17.9 40-40 40H40c-22.1 0-40-17.9-40-40V392c0-22.1 17.9-40 40-40H88c22.1 0 40 17.9 40 40zM160 72c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V72zM288 232v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V232c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40zM160 392c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H200c-22.1 0-40-17.9-40-40V392zM448 72v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V72c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40zM320 232c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V232zM448 392v48c0 22.1-17.9 40-40 40H360c-22.1 0-40-17.9-40-40V392c0-22.1 17.9-40 40-40h48c22.1 0 40 17.9 40 40z" class=""></path>
            </svg>
          </a> &nbsp; &nbsp;
          <div class="grid-drop" style="display:none">
            <div class="card custom-card overflow-hidden">
              <div class="card-body" style="background-color:#fff8e8;">
                <div class="row gap-3 gap-sm-0">
                  <div class="col-12 text-center">
                    <div class="featured-nft-img">
                      <img style="max-width:100%;" src="https://20190404hmpz.b-cdn.net/docs/uploads/user/105302/498254whatsapp image 2023-06-12 at 11.54.02 am.jpeg" alt="">
                    </div>
                    <span class="featured-nft-text">Raghunath  Gyanu  Dhumale </span>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-sm-4 text-center">
                        <small><strong>ID :</strong> 105302</small>
                      </div>
                      <div class="col-sm-4 text-center">
                        <small>Gold Plan</small>
                      </div>
                      <div class="col-sm-4 text-center">
                        <small><strong>PPI: </strong><strong class="text-danger">Inactive</strong> <a title="PPI Settings" target="_blank" href="javascript:void(0)" role="button"> <i class="fas fa-cog"></i></a></small>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <hr>
                    <div class="row">
                      <div class="col-4 text-center">
                        <a href="https://loanlenders.in/tools.html" target="_blank" class="text-dark">
                          <img src="{{asset('dist/img/home_icons/calculator.png')}}" class="grid-img" alt="Emi Calculator"><br>
                          <small>EMI Calculator <i class="fa-solid fa-arrow-up-right-from-square"></i></small>
                        </a>
                      </div>
                      <div class="col-4 text-center">
                        <a href="https://www.teamviewer.com/en-in/download/windows/" target="_blank" class="text-dark">
                          <img src="{{asset('dist/img/home_icons/teamviewer.png')}}" class="grid-img" alt="TeamViewer"><br>
                          <small>TeamViewer <i class="fa-solid fa-arrow-up-right-from-square"></i></small>
                        </a>
                      </div>
                      <div class="col-4 text-center">
                        <a href="https://anydesk.com/en/downloads/windows" target="_blank" class="text-dark">
                          <img src="{{asset('dist/img/home_icons/computer.png')}}" class="grid-img" alt="Any Desk"><br>
                          <small>Anydesk <i class="fa-solid fa-arrow-up-right-from-square"></i></small>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a data-widget="fullscreen" class="text-dark" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a> &nbsp; &nbsp;
          <a href="/index.php?path=user&method=logout" class="text-dark" role="button">
            <i class="fas fa-sign-out-alt"></i>
          </a>
          
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3">
          <div class="card custom-card overflow-hidden" style="height:100px">
            <div class="card-body user-badge" style="background-image:url('{{asset('dist/img/home_icons/gold.png')}}')">
              <p>Gold Plan</p>
              <p>Subscription &nbsp; <a class="text-light" href="/index.php?path=order&method=view&id=16105"><i class="fas fa-download"></i></a></p>
            </div>
          </div>
          <div class="card custom-card overflow-hidden" style="margin-top:5px">
            <div class="card-body p-1">
              <div class="text-success text-right"><a title="View all transactions" href="/index.php?path=wallet&method=list" target="_blank"><i class="fas fa-wallet"></i></a></div>
              <table class="table">
                <tr>
                  <th class="text-center">Main Wallet</th>
                  <th class="text-center">Earned Wallet</th>
                </tr>
                <tr>
                  <td class="text-center">
                    <h5>&#8377; 1690.00</h5>
                  </td>
                  <td class="text-center">
                    <h5>&#8377; 22.00</h5>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3">
          <div class="card custom-card overflow-hidden">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="time-frame p-3">
                    <div class="row">
                      <div class="col-6 text-center">
                        <strong>Your IP</strong><br>106.77.36.251                      </div>
                      <div class="col-6 text-center">
                        <strong>Login Since</strong><br><span id="time-elapsed"></span>
                      </div>
                                              <div class="col-12 text-center mt-2">
                          <strong>Last login at: </strong><span id="time-elapsed">30-09-2023 08:25AM</span>
                        </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="text-center">
                                                            <a href="/index.php?path=app&method=auth" target="_blank">
                      <img src="{{asset('dist/img/qrlogo.png')}}" width="64px" alt="clink app"><br>
                      <strong class="text-dark"><span class="badge" style="background-color:#90D3EF">Clink App <i class="fas fa-download" title="Download"></i></span></strong>
                    </a>
                  </div>
                </div>
                <div class="col-6">
                  <div class="text-center">
                    <a href="/index.php?path=coupon&method=history" target="_blank">
                      <img src="{{asset('dist/img/home_icons/gift-voucher.png')}}" width="64px" alt="clink app"><br>
                      <strong class="text-dark">Coupons</strong>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6">
          <div class="card custom-card overflow-hidden">
            <div class="card-body">
              <div class="row gap-3 gap-sm-0">
                <div class="col-sm-10 col-12">
                  <div class="">
                    <h4 class="fw-semibold mb-2">
                      <span id="greetings"></span>, Raghunath  Gyanu  Dhumale  <a href="/index.php?path=dsa&method=edit" target="_blank" title="Edit Profile"><i class="fas fa-user-edit"></i></a>
                    </h4>
                    <div class="row">
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">ID</div>
                        <div>105302</div>
                      </div>
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">BCP ID</div>
                        <div> - </div>
                      </div>
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">PPI Active</div>
                        <div><strong class="text-danger">Inactive</strong> <a title="PPI Settings" target="_blank" href="javascript:void(0)" role="button"> <i class="fas fa-cog"></i></a> </div>
                      </div>
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">State</div>
                        <div>Maharashtra</div>
                      </div>
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">RM Name</div>
                        <div>Disha Upadhyay</div>
                      </div>
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">RM No.</div>
                        <div>8527477573</div>
                      </div>
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">Plan Name</div>
                        <div>Gold Plan</div>
                      </div>
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">Joining Date</div>
                        <div>27th Jun, 2023</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2 col-auto my-auto">
                  <div class="featured-nft">
                    <img style="max-width:100%;max-height:100%" src="https://20190404hmpz.b-cdn.net/docs/uploads/user/105302/498254whatsapp image 2023-06-12 at 11.54.02 am.jpeg" alt="">
                  </div>
                </div>
                <div class="col-12 btn-list pt-3 d-flex">
                  <a href="https://kb.hoogmatic.in" target="_blank" class="btn btn-outline-primary flex-fill">Knowledge Base <i class="fas fa-lightbulb"></i></a>
                  <a href="/index.php?path=dsa&method=agreement" target="_blank" class="btn btn-outline-primary flex-fill">Agreement <i class="fas fa-download"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">&nbsp;</div>
      </div>
      <div class="row">
        <div class="col-3">
          <div class="card custom-card card card-danger overflow-hidden">
            <div class="card-header">
              <h3 class="card-title">Webinar</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4 text-center">
                  <a href="javascript:void(0)" target="_blank">
                    <img src="{{asset('dist/img/home_icons/join.gif')}}" width="64px" alt="hoogmoney"><br>
                    <strong class="text-dark">Join</strong>
                  </a>
                </div>
                <div class="col-4 text-center">
                  <a href="https://meeting.hoogmatic.com/meeting/public/videoprv?recordingId=5b2afb0c01222ea675c50b34b40edb8ee49a8342faaa33e537971049dc0c2564" target="_blank">
                    <img src="{{asset('dist/img/home_icons/hoogmoney-webinar.png')}}" width="64px" alt="hoogmoney"><br>
                    <strong class="text-dark">HoogMoney</strong>
                  </a>
                </div>
                <div class="col-4 text-center">
                  <a href="https://webinar.zoho.in/meeting/public/videoprv?recordingId=87a0672e7c9790f07c7fc2c2dbeba944d2bd2955a707b2f7b5d8437c63e341db" target="_blank">
                    <img src="{{asset('dist/img/home_icons/recorded-webinar.png')}}" width="64px" alt="hoogmoney"><br>
                    <strong class="text-dark">Recorded</strong>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-7">
          <div class="card custom-card card-success overflow-hidden">
            <div class="card-header">
              <h3 class="card-title">Certificates & Authorization</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 text-center">
                  <a href="/index.php?path=dsa&method=certificate" target="_blank">
                    <img src="{{asset('dist/img/home_icons/loan-lenders-certificate.png')}}" width="64px" alt="hoogmoney"><br>
                    <strong class="text-dark">Loan Lenders Certificate</strong>
                  </a>
                </div>
                <div class="col-6 text-center">
                  <a href="/index.php?path=dsa&method=authorisation" target="_blank">
                    <img src="{{asset('dist/img/home_icons/loan-lenders-letter.png')}}" width="64px" alt="hoogmoney"><br>
                    <strong class="text-dark">Loan Lenders Authorization Letter</strong>
                  </a>
                </div>
                              </div>
            </div>
          </div>
        </div>
        <div class="col-2">
          <div class="card custom-card card-primary overflow-hidden">
            <div class="card-header">
              <h3 class="card-title">Promotions</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 text-center">
                  <a href="/index.php?path=promotion&method=categories#" target="_blank">
                    <img src="{{asset('dist/img/home_icons/banners.gif')}}" width="64px" alt="hoogmoney"><br>
                    <strong class="text-dark">Banners</strong>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">&nbsp;</div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <div class="card custom-card card-warning overflow-hidden">
            <div class="card-header">
              <h3 class="card-title">All Panels (Active)</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-sm-2 col-offset-1 panelcard" style="cursor:pointer" data-link="https://connector.hoogmatic.in/index.php?path=loan&method=add_new">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/loan.png')}}" alt="loan">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"><img src="{{asset('dist/img/home_icons/link.png')}}" alt="link"> Loan Panel</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-2 panelcard" style="cursor:pointer" data-link="https://connector.hoogmatic.in/index.php?path=insurance&method=add_new">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/insurance.png')}}" alt="micro">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"><img src="{{asset('dist/img/home_icons/link.png')}}" alt="link"> Insurance Panel</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-2 panelcard" style="cursor:pointer" data-link="https://dsp.hoogmatic.in">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/tax.png')}}" alt="tax">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"><img src="{{asset('dist/img/home_icons/link.png')}}" alt="link"> Taxation Panel</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-2 panelcard" style="cursor:pointer" data-link="https://connector.hoogmatic.in/index.php?path=roc&method=list">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/roc.png')}}" alt="micro">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"><img src="{{asset('dist/img/home_icons/link.png')}}" alt="link"> ROC Panel</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="col-sm-2 panelcard" style="cursor:pointer" data-link="https://dashboard.vistarkriya.com">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/vistarkriya.png')}}" alt="vistarkriya">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"> <img src="{{asset('dist/img/home_icons/link.png')}}" alt="link"> Vistarkriya Panel</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-sm-2 panelcard" style="cursor:pointer" data-link="https://eyojana.hoogmatic.in">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/eyojana.png')}}" alt="e-Yojana">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"><img src="{{asset('dist/img/home_icons/link.png')}}" alt="link"> e-Yojana Panel</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-2 panelcard" style="cursor:pointer" data-link="https://connector.hoogmatic.in/index.php?path=cclead&method=newloan&type=cc&loan_mode=New">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/credit_card.png')}}" alt="Credit Card">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"><img src="{{asset('dist/img/home_icons/link.png')}}" alt="link">Credit Card</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">&nbsp;</div>
      </div>
      <div class="row">
        <div class="col-4 text-center">
          <div class="card custom-card card-success overflow-hidden">
            <div class="card-header">
              <h3 class="card-title">Add On Panels (Active)</h3>
            </div>
          </div>
        </div>
        <div class="col-8 text-center">
          <div class="card custom-card card-info overflow-hidden">
            <div class="card-header">
              <h3 class="card-title">HoogMoney (Active)</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-4">
          <div class="row">
            <div class="col-sm-6 panelcard" style="cursor:pointer" data-link="http://connector.hoogmatic.in/index.php?path=home&method=micro_panel">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/micro.png')}}" alt="micro">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"><img src="{{asset('dist/img/home_icons/link.png')}}" alt="link">Micro Panel</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 panelcard" style="cursor:pointer" data-link="https://dashboard.vistarkriya.com">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/vistarkriya.png')}}" alt="Vistarkriya">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"> <img src="{{asset('dist/img/home_icons/link.png')}}" alt="link">Vistarkriya Panel</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="row">
            <div class="col-sm-3 panelcard" style="cursor:pointer" data-link="http://agent.ipai.in/doFlightBooking.do?param=loadSearchFlight">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/airplane-ticket.png')}}" alt="micro">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"><img src="{{asset('dist/img/home_icons/link.png')}}" alt="link">Flight Booking</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3 panelcard" style="cursor:pointer" data-link="http://agent.ipai.in/doMyDmr.do?param=viewDmr">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/transfer.png')}}" alt="Money Transfer">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"> <img src="{{asset('dist/img/home_icons/link.png')}}" alt="link">Money Transfer</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3 panelcard" style="cursor:pointer" data-link="http://agent.ipai.in/bbps.do?param=viewPage">
              <div class="card custom-card">
                <div class="card-body">
                  <div class="d-flex flex-wrap align-items-top">
                    <div class="mr-3 panel-icon lh-1">
                      <img src="{{asset('dist/img/home_icons/bill.png')}}" alt="Bill Payment">
                    </div>
                    <hr>
                    <div>
                      <h5 class="mb-1"><img src="{{asset('dist/img/home_icons/link.png')}}" alt="link">BBPS</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3 panelcard" style="cursor:pointer" data-link="http://agent.ipai.in">
              <div class="card custom-card">
                <div class="card-body">
                  <button type="button" class="btn btn-outline-success" style="margin:40px auto;text-align:center;">View All</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">&nbsp;</div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card custom-card card-info overflow-hidden">
            <div class="card-header">
              <div class="row">
                <div class="col-8">
                  <h3 class="card-title">Commission & Service Price list</h3>
                </div>
                <div class="col-4 text-right">
                  <i class="fas fa-info-circle fa-lg" data-toggle="tooltip" data-html="true" data-placement="bottom" title="<p><strong>Disclaimer:</strong> In Business Loan, Home Loans, and Loan against Property the payout depends on the ticket size.</p><p><strong>Maximum Payout can be in:</strong><br>Business Loan up to 2.5%<br>Home Loan up to 0.70%<br>Loan Against Property up to 1.20%</p>"></i>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-5 col-sm-3">
                  <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active text-dark" id="vert-tabs-loan-tab" data-toggle="pill" href="#vert-tabs-loan" role="tab" aria-controls="vert-tabs-loan" aria-selected="true">
                      Loan <span class="float-right badge badge-warning">Annexure - LC</span>
                    </a>
                    <a class="nav-link text-dark" id="vert-tabs-insurance-tab" data-toggle="pill" href="#vert-tabs-insurance" role="tab" aria-controls="vert-tabs-insurance" aria-selected="false">
                      Insurance <span class="float-right badge badge-warning">Annexure - IC</span>
                    </a>
                    <a class="nav-link text-dark" id="vert-tabs-e-yojana-tab" data-toggle="pill" href="#vert-tabs-e-yojana" role="tab" aria-controls="vert-tabs-e-yojana" aria-selected="false">
                      e-Yojana <span class="float-right badge badge-warning">Annexure - EYC</span>
                    </a>
                    <a class="nav-link text-dark" id="vert-tabs-hoog-money-tab" data-toggle="pill" href="#vert-tabs-hoog-money" role="tab" aria-controls="vert-tabs-hoog-money" aria-selected="false">
                      Hoog-Money <span class="float-right badge badge-warning">Annexure - HMoC</span>
                    </a>
                    <a class="nav-link text-dark" id="vert-tabs-taxation-tab" data-toggle="pill" href="#vert-tabs-taxation" role="tab" aria-controls="vert-tabs-taxation" aria-selected="false">
                      Taxation Services <span class="float-right badge badge-warning">Annexure - TC</span>
                    </a>
                    <a class="nav-link text-dark" id="vert-tabs-micro-tab" data-toggle="pill" href="#vert-tabs-micro" role="tab" aria-controls="vert-tabs-micro" aria-selected="false">
                      Micro Services <span class="float-right badge badge-warning">Annexure - MC</span>
                    </a>
                    <a class="nav-link text-dark" id="vert-tabs-vistarkriya-tab" data-toggle="pill" href="#vert-tabs-vistarkriya" role="tab" aria-controls="vert-tabs-vistarkriya" aria-selected="false">
                      Vistarkriya <span class="float-right badge badge-warning">Annexure - VC</span>
                    </a>
                  </div>
                </div>
                <div class="col-7 col-sm-9">
                  <div class="tab-content" id="vert-tabs-tabContent">
                    <div class="tab-pane text-left fade show active" id="vert-tabs-loan" role="tabpanel" aria-labelledby="vert-tabs-loan-tab">
                                                                  <div class="row" style="max-height:300px;overflow-y:scroll;">
                                                  <div class="col-sm-6">
                            <div class="card custom-card card-primary overflow-hidden">
                              <div class="card-header">
                                <h3 class="card-title">Personal Loan</h3>
                              </div>
                              <div class="card-body">
                                <table class="table table-sm">
                                  <tr>
                                    <th>Bank/NBFC</th>
                                    <th>Commission up to</th>
                                  </tr>
                                                                      <tr>
                                      <td>IIFL</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Fullerton (Normal)</td>
                                      <td>2.75%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Bajaj</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Axis Bank (Metro)</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>HDFC Bank (Prime)</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>HDFC Bank (Prime) Govt Fresh Cases Only</td>
                                      <td>2.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Hero Fincorp</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>ICICI Bank (Prime)</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>IDFC First Bank</td>
                                      <td>2.25%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Incred</td>
                                      <td>2.10%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Indusind</td>
                                      <td>2.10%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Kotak Mahindra</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Muthoot</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Standard Chartered Bank</td>
                                      <td>2.10%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Tata Capital (Normal)</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Finable</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Yes Bank (Govt)</td>
                                      <td>2.25%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Yes Bank (Pvt)</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Yes Bank (Silver)</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Aditya Birla</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                  </table>
                              </div>
                            </div>
                          </div>
                                                  <div class="col-sm-6">
                            <div class="card custom-card card-primary overflow-hidden">
                              <div class="card-header">
                                <h3 class="card-title">Business Loan</h3>
                              </div>
                              <div class="card-body">
                                <table class="table table-sm">
                                  <tr>
                                    <th>Bank/NBFC</th>
                                    <th>Commission up to</th>
                                  </tr>
                                                                      <tr>
                                      <td>HDFC (Prime)</td>
                                      <td>2.25%</td>
                                    </tr>
                                                                      <tr>
                                      <td>ICICI</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Edelweiss - Banking</td>
                                      <td>2.25%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Fullerton -  ( Hr )</td>
                                      <td>2.25%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Tata Capital</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Tata Capital - Sep & Bod</td>
                                      <td>1.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Magma</td>
                                      <td>2.25%</td>
                                    </tr>
                                                                      <tr>
                                      <td>IDFC Bank</td>
                                      <td>2.25%</td>
                                    </tr>
                                                                      <tr>
                                      <td>RBL Bank</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Axis Bank -  ( Hr )</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Aditya Birla</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>SCB Bank</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Yes Bank</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Kapital Tech - BL</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Hero Fincorp</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Lending Kart</td>
                                      <td>1.75%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Neogrowth - Cash Exp</td>
                                      <td>1.75%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Deutsche Bank</td>
                                      <td>1.75%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Bajaj(Only Prime)</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Bajaj</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Indifi Finance</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>IIFL</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                  </table>
                              </div>
                            </div>
                          </div>
                                                  <div class="col-sm-6">
                            <div class="card custom-card card-primary overflow-hidden">
                              <div class="card-header">
                                <h3 class="card-title">Home Loan</h3>
                              </div>
                              <div class="card-body">
                                <table class="table table-sm">
                                  <tr>
                                    <th>Bank/NBFC</th>
                                    <th>Commission up to</th>
                                  </tr>
                                                                      <tr>
                                      <td>PNB Housing</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Shinhan Bank</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>IDFC Bank</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Federal Bank</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Fullerton Gruhshakti</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>SCB Bank</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Tata Hfl  </td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Vastu Finance</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>ICICI Bank</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Kotak</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Citi Bank</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Clix Capital</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>HDFC-HL</td>
                                      <td>0.50%</td>
                                    </tr>
                                                                  </table>
                              </div>
                            </div>
                          </div>
                                                  <div class="col-sm-6">
                            <div class="card custom-card card-primary overflow-hidden">
                              <div class="card-header">
                                <h3 class="card-title">Loan Against Property</h3>
                              </div>
                              <div class="card-body">
                                <table class="table table-sm">
                                  <tr>
                                    <th>Bank/NBFC</th>
                                    <th>Commission up to</th>
                                  </tr>
                                                                      <tr>
                                      <td>Tata FSL   (Metro City'S)</td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Pnb Housing  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Icici Hfc   ( Micro  )</td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Tata Hfl  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Aditya Birla Capital   (Stsl) Upto 1Cr</td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Shinhan Bank  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Yes Bank  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Hero Fincorp  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Hdfc Bank  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Idfc First  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Iifl Samman  Upto 20 Lacs</td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>SCB Bank</td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Hdfc Ltd </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Cholamandalam</td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Indostar  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Axis Bank  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Fullerton Gruhshakti  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Fullerton India  Main </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Kotak  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Icici Bank  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Shriram City  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Profectus Capital  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>IIFL</td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Vastu Finance </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Vistaar  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Axis Finance  </td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Bajaj Housing</td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>HDB</td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Citibank</td>
                                      <td>0.90%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Duetsche</td>
                                      <td>0.90%</td>
                                    </tr>
                                                                  </table>
                              </div>
                            </div>
                          </div>
                                                  <div class="col-sm-6">
                            <div class="card custom-card card-primary overflow-hidden">
                              <div class="card-header">
                                <h3 class="card-title">Car Loan</h3>
                              </div>
                              <div class="card-body">
                                <table class="table table-sm">
                                  <tr>
                                    <th>Bank/NBFC</th>
                                    <th>Commission up to</th>
                                  </tr>
                                                                      <tr>
                                      <td>New Car Loan</td>
                                      <td>1.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Used Car Loan</td>
                                      <td>2.00%</td>
                                    </tr>
                                                                  </table>
                              </div>
                            </div>
                          </div>
                                              </div>
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-insurance" role="tabpanel" aria-labelledby="vert-tabs-insurance-tab" style="max-height:300px;overflow-y:scroll;">
                      <p>The commission on the Insurance leads is subject to various parameters. For more details kindly ask the Insurance RM on the particular lead before the policy is done.</p>
                      <table class="table table-sm">
                        <tr>
                          <th>Insurance Type</th>
                          <th>Commission up to</th>
                        </tr>
                        <tr>
                          <td>Private Car Insurance</td>
                          <td>25.00%</td>
                        </tr>
                        <tr>
                          <td>Bike Insurance</td>
                          <td>30.00%</td>
                        </tr>
                        <tr>
                          <td>Private Car Tp Only</td>
                          <td>15.00%</td>
                        </tr>
                        <tr>
                          <td>Lcv Package</td>
                          <td>30.00%</td>
                        </tr>
                        <tr>
                          <td>Hcv Package</td>
                          <td>10.00%</td>
                        </tr>
                        <tr>
                          <td>School Bus Package</td>
                          <td>60.00%</td>
                        </tr>
                        <tr>
                          <td>3W Gcv/Pcv Package</td>
                          <td>35.00%</td>
                        </tr>
                        <tr>
                          <td>Taxi Package</td>
                          <td>20.00%</td>
                        </tr>
                        <tr>
                          <td>Tractor Only</td>
                          <td>15.00%</td>
                        </tr>
                        <tr>
                          <td>Health Insurance</td>
                          <td>30.00%</td>
                        </tr>
                        <tr>
                          <td>Travel Insurance</td>
                          <td>25.00%</td>
                        </tr>
                        <tr>
                          <td>Other Insurance</td>
                          <td>35.00%</td>
                        </tr>
                      </table>
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-e-yojana" role="tabpanel" aria-labelledby="vert-tabs-e-yojana-tab" style="max-height:300px;overflow-y:scroll;">
                      e-Yojana
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-hoog-money" role="tabpanel" aria-labelledby="vert-tabs-hoog-money-tab" style="max-height:300px;overflow-y:scroll;">
                      <div class="row">
                        <div class="col-sm-6 hoogmoney-box">
                          <table class="table">
                            <tr>
                              <th colspan="2">Mobile Recharge</th>
                            </tr>
                            <tr>
                              <th>Service Provider</th>
                              <th>Commission</th>
                            </tr>
                            <tr>
                              <td>Airtel</td>
                              <td>Upto 2%</td>
                            </tr>
                            <tr>
                              <td>Bsnl</td>
                              <td>Upto 2%</td>
                            </tr>
                            <tr>
                              <td>Vi</td>
                              <td>Upto 2%</td>
                            </tr>
                            <tr>
                              <td>Jio</td>
                              <td>Upto 3%</td>
                            </tr>
                            <tr>
                              <td>Mtnl</td>
                              <td>Upto 2%</td>
                            </tr>
                            <tr>
                              <td>Postpaid Mobile Bill Payment</td>
                              <td>Upto 2%</td>
                            </tr>
                          </table>
                        </div>
                        <div class="col-sm-6 hoogmoney-box">
                          <table class="table">
                            <tr>
                              <th colspan="2">DTH Recharge</th>
                            </tr>
                            <tr>
                              <th>Service Provider</th>
                              <th>Commission</th>
                            </tr>
                            <tr>
                              <td>Airtel Digital Tv</td>
                              <td>Upto 2%</td>
                            </tr>
                            <tr>
                              <td>Dish Tv</td>
                              <td>Upto 2%</td>
                            </tr>
                            <tr>
                              <td>Reliance Digital Tv</td>
                              <td>Upto 3%</td>
                            </tr>
                            <tr>
                              <td>Sun Direct</td>
                              <td>Upto 3%</td>
                            </tr>
                            <tr>
                              <td>Tata Sky</td>
                              <td>Upto 3%</td>
                            </tr>
                            <tr>
                              <td>Videocon D2H</td>
                              <td>Upto 3%</td>
                            </tr>
                          </table>
                        </div>
                        <div class="col-sm-6 hoogmoney-box">
                          <table class="table">
                            <tr>
                              <th colspan="2">Bill Payment Services</th>
                            </tr>
                            <tr>
                              <th>Service Provider</th>
                              <th>Commission</th>
                            </tr>
                            <tr>
                              <td>Broadband Postpaid</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Dth</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Electricity Bill Payment</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Gas</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Landline Postpaid</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Water Bill Payment</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Fastag</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Loan Repayment</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Life Insurance</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Education Fees</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Lpg Gas</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Cable Tv</td>
                              <td>As Per Tarif</td>
                            </tr>
                            <tr>
                              <td>Municipal Tax</td>
                              <td>As Per Tarif</td>
                            </tr>
                          </table>
                        </div>
                        <div class="col-sm-6 hoogmoney-box">
                          <table class="table">
                            <tr>
                              <th colspan="2">Money Transfer Services</th>
                            </tr>
                            <tr>
                              <th>Amount</th>
                              <th>Surcharge</th>
                            </tr>
                            <tr>
                              <td>₹1 - ₹1000</td>
                              <td>₹ 8.53/-</td>
                            </tr>
                            <tr>
                              <td>₹1001 - ₹2000</td>
                              <td>₹ 11.00/-</td>
                            </tr>
                            <tr>
                              <td>₹2001 - ₹3000</td>
                              <td>₹ 15.00/-</td>
                            </tr>
                            <tr>
                              <td>₹3001 - ₹4000</td>
                              <td>₹ 20.00/-</td>
                            </tr>
                            <tr>
                              <td>₹4001 - ₹5000</td>
                              <td>₹ 25.00/-</td>
                            </tr>
                            <tr>
                              <td>Above ₹5000</td>
                              <td>0.50%</td>
                            </tr>
                            <tr>
                              <td>Account Verification Charges</td>
                              <td>₹ 5.00/-</td>
                            </tr>
                          </table>
                        </div>
                        <div class="col-sm-6 hoogmoney-box">
                          <table class="table">
                            <tr>
                              <th colspan="2">Aadhar ATM (AEPS)</th>
                            </tr>
                            <tr>
                              <th>Amount</th>
                              <th>Commission</th>
                            </tr>
                            <tr>
                              <td>₹1 - ₹199</td>
                              <td>₹ 0.00/-</td>
                            </tr>
                            <tr>
                              <td>₹200 - ₹999</td>
                              <td>₹ 0.81/-</td>
                            </tr>
                            <tr>
                              <td>₹1000 - ₹1999</td>
                              <td>₹ 1.63/-</td>
                            </tr>
                            <tr>
                              <td>₹2000 - ₹2999</td>
                              <td>₹ 3.58/-</td>
                            </tr>
                            <tr>
                              <td>₹3000 - ₹3499</td>
                              <td>₹ 6.50/-</td>
                            </tr>
                            <tr>
                              <td>₹3500 - ₹10000</td>
                              <td>₹ 4.55/-</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-taxation" role="tabpanel" aria-labelledby="vert-tabs-taxation-tab" style="max-height:300px;overflow-y:scroll;">
                      Taxation
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-micro" role="tabpanel" aria-labelledby="vert-tabs-micro-tab">
                                                                  <div class="row" style="max-height:300px;overflow-y:scroll;">
                                                  <div class="col-sm-6">
                            <div class="card custom-card card-primary overflow-hidden">
                              <div class="card-header">
                                <h3 class="card-title">Micro Loan</h3>
                              </div>
                              <div class="card-body">
                                <table class="table table-sm">
                                  <tr>
                                    <th>Bank/NBFC</th>
                                    <th>Commission up to</th>
                                  </tr>
                                                                      <tr>
                                      <td>Kreditbee</td>
                                      <td>2.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Insta Money</td>
                                      <td>1.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Cashe</td>
                                      <td>1.00%</td>
                                    </tr>
                                                                      <tr>
                                      <td>NIRA Finance</td>
                                      <td>1.50%</td>
                                    </tr>
                                                                      <tr>
                                      <td>Easy Salary</td>
                                      <td>₹ 500.00/-</td>
                                    </tr>
                                                                      <tr>
                                      <td>Mpokket</td>
                                      <td>₹ 100.00/-</td>
                                    </tr>
                                                                  </table>
                              </div>
                            </div>
                          </div>
                                                  <div class="col-sm-6">
                            <div class="card custom-card card-primary overflow-hidden">
                              <div class="card-header">
                                <h3 class="card-title">Credit Card</h3>
                              </div>
                              <div class="card-body">
                                <table class="table table-sm">
                                  <tr>
                                    <th>Bank/NBFC</th>
                                    <th>Commission up to</th>
                                  </tr>
                                                                      <tr>
                                      <td>Citi Bank</td>
                                      <td>₹2500/-</td>
                                    </tr>
                                                                      <tr>
                                      <td>SBI Cards</td>
                                      <td>₹1500/-</td>
                                    </tr>
                                                                      <tr>
                                      <td>Yes Bank</td>
                                      <td>₹1500/-</td>
                                    </tr>
                                                                      <tr>
                                      <td>Indusind</td>
                                      <td>₹1800/-</td>
                                    </tr>
                                                                      <tr>
                                      <td>IDFC Credit Card</td>
                                      <td>₹1230/-</td>
                                    </tr>
                                                                      <tr>
                                      <td>Kotak</td>
                                      <td>₹1000/-</td>
                                    </tr>
                                                                      <tr>
                                      <td>HDFC</td>
                                      <td>₹1000/-</td>
                                    </tr>
                                                                      <tr>
                                      <td>AU Small Finance Bank</td>
                                      <td>₹1000/-</td>
                                    </tr>
                                                                      <tr>
                                      <td>Axis Bank</td>
                                      <td>₹1350/-</td>
                                    </tr>
                                                                  </table>
                              </div>
                            </div>
                          </div>
                                              </div>
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-vistarkriya" role="tabpanel" aria-labelledby="vert-tabs-vistarkriya-tab">
                      <div class="row">
                        <div class="col-12">
                          In Vistakriya Panel,<br>The company will issue the quotation to the connector and connector can add competitive mark-up to that quotation. No commission will be paid to the connector from company side. Here company means <strong>"Vistarkriya Marketings Private Limited"</strong>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          &nbsp;
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          &nbsp;
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          &nbsp;
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 text-center">
                          <a href="https://dashboard.vistarkriya.com" target="_blank" class="btn btn-success">Go to Vistarkriya Panel</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">&nbsp;</div>
      </div>

      <div class="row">
        <div class="col-12" id="hm_list">

        </div>
      </div>
      <div class="row">
        <div class="col-12">&nbsp;</div>
      </div>
      <div class="row">
        <div class="col-12" id="loan_list">&nbsp;</div>
      </div>
    </div>
  </section>
</div>
<script>
  $(".panelcard").click(function() {
    var link = $(this).data("link");
    var win = window.open(link, '_blank');
    if (win) {
      win.focus();
    } else {
      //Browser has blocked it
      alert('Please allow popups for this website');
    }
  });
  var myDate = new Date();
  var hrs = myDate.getHours();
  //var hrs = 10;
  var greet;
  if (hrs < 12) {
    greet = 'Good Morning';
  } else if (hrs >= 12 && hrs <= 17) {
    greet = 'Good Afternoon';
  } else if (hrs >= 17 && hrs <= 24) {
    greet = 'Good Evening';
  }
  document.getElementById('greetings').innerHTML = '<b>' + greet + '</b>';

  function resizeimgbox(id) {
    var width = $(id).width();
    $(id).height(width);
  }
  $(document).ready(function() {
    resizeimgbox(".featured-nft");
    $.ajax({
      url: "/index.php?path=hm&method=homelist",
      type: "GET",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function() {},
      success: function(data) {
        $("#hm_list").html(data);
      },
      error: function(e) {
        console.log(e);
      }
    });

    $.ajax({
      url: "/index.php?path=loan&method=homelist",
      type: "GET",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function() {},
      success: function(data) {
        $("#loan_list").html(data);
      },
      error: function(e) {
        console.log(e);
      }
    });

    $.ajax({
      url: "/index.php?path=hm&method=service_list_main",
      type: "GET",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function() {},
      success: function(data) {
        $("#vert-tabs-taxation").html(data);
      },
      error: function(e) {
        console.log(e);
      }
    });

    $.ajax({
      url: "/index.php?path=yojana&method=service_list_main",
      type: "GET",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function() {},
      success: function(data) {
        $("#vert-tabs-e-yojana").html(data);
      },
      error: function(e) {
        console.log(e);
      }
    });

    //time-elapsed
    function toHoursAndMinutes(totalSeconds) {
      var totalMinutes = Math.floor(totalSeconds / 60);

      var seconds = totalSeconds % 60;
      var hours = Math.floor(totalMinutes / 60);
      var minutes = totalMinutes % 60;
      if (hours < 10) {
        hours = "0" + hours;
      }
      if (minutes < 10) {
        minutes = "0" + minutes;
      }
      if (seconds < 10) {
        seconds = "0" + seconds;
      }
      return hours + ":" + minutes + ":" + seconds;
    }
    var past = new Date('2023-10-12 18:33:07');
    setInterval(function() {
      var now = new Date();
      var elapsed = (now - past);
      var sec = Math.trunc((elapsed / 1000));
      var s = toHoursAndMinutes(sec);
      $("#time-elapsed").html(s);
    }, 1000);

    $("#grid-icon").click(function() {
      $(".grid-drop").toggle();
    });

  })
  $(window).resize(function() {
    resizeimgbox(".featured-nft");
  });
</script>  <footer class="main-footer bg-dark" style="margin-left:auto;">
          <div class="row">
        <div class="col-md-3">
          <h3 class="text-warning">Hoogmatic</h3>
          <ul class="footer-ul">
                      <li class="nav-item"><a href="https://8tbt2ifc85wau6yu4664bkkllp69jd4wo2ox42b3n7h6u0ao5k4.hoogmatic.in" target="_blank" class="footer-list">Franchisee Login</a></li>
           
            <li class="nav-item"><a href="https://bcp.hoogmatic.in" target="_blank" class="footer-list">BCP Login</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h3 class="text-warning">Hoog Money</h3>
          <ul class="footer-ul">
            <li class="nav-item"><a href="http://agent.hoogmatic.in/" target="_blank" class="footer-list">Agent Login</a></li>
            <li class="nav-item"><a href="http://distributor.hoogmatic.in/" target="_blank" class="footer-list">Distributor Login</a></li>
          </ul>  
        </div>
        <div class="col-md-3">
          <h3 class="text-warning">Loan Lenders</h3>
          <ul class="footer-ul">
            <li class="nav-item"><a href="https://connector.loanlenders.in" target="_blank" class="footer-list">Connector Login</a></li>
            <li class="nav-item"><a href="https://bcp.loanlenders.in" target="_blank" class="footer-list">BCP Login</a></li>
            <li class="nav-item"><a href="/index.php?path=promotion&method=categories" target="_blank" class="footer-list">Banners</a></li>
            <li class="nav-item"><a href="/index.php?path=dsa&method=certificate" class="footer-list">Certificate Download</a></li>
            <li class="nav-item"><a href="/index.php?path=dsa&method=authorisation" class="footer-list">Authorisation Letter Download</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h3 class="text-warning">Quick Links</h3>
          <ul class="footer-ul">
            <li class="nav-item"><a href="https://hoogmatic.in/index.php/knowledge-base/" target="_blank" class="footer-list">Knowledg Base</a></li>
            <li class="nav-item"><a href="/index.php?path=home&method=tutorial" class="footer-list">Video Tutorials</a></li>
                        <li class="nav-item"><a href="https://media.hoogmatic.in/" class="footer-list" target="_blank">Media</a></li>
            <li class="nav-item"><a href="https://anydesk.com/en/downloads/thank-you?dv=win_exe" target="_blank" class="footer-list">Download AnyDesk</a></li>
          </ul>  
        </div>
      </div>
        <hr style="border-top: 1px solid rgb(227 227 227 / 50%);">
    <div class="row">
      <div class="col-md-12" style="font-size:12px;">
        <strong>Attention:</strong><br>
        HOOGMATIC OR LOAN LENDERS never asks any details related to debit cards and credit cards and Net Banking like CVV, OTP, SMS or any other highly confidential information. If an HOOGMATIC OR LOAN LENDERS customer receives any such mail or phone call, then they should understand that this is an online trick to steal their money. For any report, kindly email us at hello@hoogmatic.in
      </div>
    </div>
    <hr style="border-top: 1px solid rgb(227 227 227 / 50%);">
    <div class="row">
      <div class="col-md-12">
        <p style="font-size:13px">
          <i class="fas fa-map-marker-alt text-success"></i> &nbsp; <strong class="text-warning">Delhi</strong> <span>Head Office: H.NO-9&10 S/F, C-1 Blk, Rama Park, Uttam Nagar, New Delhi, Delhi: 110059 IN. Near Metro Station</span>
        </p>
        <p style="font-size:13px">
          <i class="fas fa-map-marker-alt text-success"></i> &nbsp; <strong  class="text-warning">Dehradun</strong> <span>Branch Office: 2nd floor , 15 A , Subhash Road Dehradun , 248001 , Near White House Hotel</span>
        </p>
        <p style="font-size:13px">
          <i class="fas fa-map-marker-alt text-success"></i> &nbsp; <strong  class="text-warning">Gujarat</strong> <span>Branch Office: E-105 , Swagat Flamingo , Swagat Holiday Mall , Near Sargasan Circle , Sargasan , Gandhinagar 382421</span>
        </p>
        <p style="font-size:13px">
          <i class="fas fa-map-marker-alt text-success"></i> &nbsp; <strong  class="text-warning">Patna</strong> <span>Branch Office: Leela Complex , Rukanpura Flyover , Bailey Road Patna , Bihar , 800014</span>
        </p> 
      </div>
    </div>
    <div class="row">
      <div class="col-12" style="font-size:12px;">
        Hoogmatic is present in more than 25 states of India- ANDHRA PRADESH | ASSAM | BIHAR | CHANDIGARH | CHHATTISGARH | DELHI | GUJARAT | HIMACHAL PRADESH | HARYANA | JHARKHAND | JAMMU AND KASHMIR | KARNATAKA | MAHARASHTRA | MADHYA PRADESH | ORISSA | PUNJAB | RAJASTHAN | SIKKIM | TAMIL NADU | TELANGANA | UTTARAKHAND | UTTAR PRADESH | WEST BENGAL. With lots of ❤ from Hoog Software Private Limited.
      </div>
    </div>
    <hr style="border-top: 1px solid rgb(227 227 227 / 50%);">
    <div class="row">
      <div class="col-6">
        <strong>Copyright &copy; 2019-2023 <a href="https://hoogmatic.in">Hoogmatic</a>.</strong> All rights reserved.
      </div>
      <div class="col-6">
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.1
      </div>
      </div>
    </div>
  </footer>
  <!-- common popups -->
  
<!-- common popups end -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="{{asset('dist/js/jquery.countdown.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{asset('dist/js/common.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--  -->
<script src="{{asset('plugins/toastr/toastr.min.js?v=14')}}"></script>
<script src="{{asset('plugins/select2/js/select2.min.js?v=14')}}"></script>
<script src="{{asset('dist/js/switch.action.js?v=14')}}"></script>
<script src="{{asset('dist/js/hm.document.upload.js?v=14')}}"></script>
<script src="{{asset('plugins/dropzone/min/dropzone.min.js?v=14')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js?v=14')}}"></script>
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js?v=14')}}"></script>
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
</body>
</html>