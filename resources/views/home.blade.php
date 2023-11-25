@extends('layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8">
          <div class="card custom-card overflow-hidden">
            <div class="card-body">
              <div class="row gap-3 gap-sm-0">
                <div class="col-sm-10 col-12">
                  <div class="">
                    <h4 class="fw-semibold mb-2">
                      <span id="greetings">Good @if(date('H') <= 12) Morning @elseif(date('H') >= 12 && date('H')<=18) Afternoon @else Evening @endif</span>, {{Auth::user()->first_name??''}} {{Auth::user()->middle_name??''}} {{Auth::user()->last_name??''}}  <a href="{{url('home')}}?path=dsa&method=edit" title="Edit Profile"><i class="fas fa-user-edit"></i></a>
                  </h4>
                  <div class="row">
                      <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">ID</div>
                        <div>{{10000 + Auth::user()->id}}</div>
                    </div>
                    <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">BCP ID</div>
                        <div> - </div>
                    </div>
                    <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">PPI Active</div>
                        <div>
                          @if(Auth::user()->is_active ==1)
                          <strong class="text-success">Active</strong>
                          @else
                          <strong class="text-danger">Inactive</strong>
                          @endif
                         <a title="PPI Settings" href="javascript:void(0)" role="button"> <i class="fas fa-cog"></i></a> </div>
                    </div>
                    <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">State</div>
                        <div>{{Auth::user()->state??''}}</div>
                    </div>
                    <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">RM Name</div>
                        <div>
                          @php
                          $record =App\Models\User::where('id',Auth::user()->agent_id)->first();
                          @endphp
                          @php
                          if($record!=null)
                          echo ucwords($record->first_name." ".$record->last_name);
                          else
                          echo "-";
                          @endphp
                        </div>
                    </div>
                    <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">RM No.</div>
                        <div>
                          @php
                          if($record!=null)
                          echo $record->mobile_number;
                          else
                          echo "-";
                          @endphp
                        </div>
                    </div>
                    
                    <div class="col-sm-3 mt-3 home-left-items">
                        <div class="home-title">Joining Date</div>
                        <div>{{Auth::user()->created_at->format('d-M-Y')}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-auto my-auto">
          <div class="featured-nft">
            <img style="max-width:100%;max-height:100%" src="{{url('storage/app')}}/{{Auth::user()->profile}}" alt="">
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






<div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4">

  <div class="card custom-card overflow-hidden" style="margin-top:0px">
    <div class="card-body p-1" style="height:239px;">
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


</div>
<div class="row">
    <div class="col-12">&nbsp;</div>
</div>
<div class="row">
    <div class="col-5">
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
        <div class="col-sm-6 col-offset-1 panelcard" style="cursor:pointer" onclick=window.location.href="{{url('loan-panel')}}">
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

<div class="col-sm-6 panelcard" style="cursor:pointer" onclick=window.location.href="{{url('credit-card')}}">
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
</div>
<div class="col-5">

  <div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12 text-center">
              <div class="card custom-card card-success overflow-hidden">
                <div class="card-header">
                  <h3 class="card-title">Certificates & Authorization</h3>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-sm-6 col-offset-1 panelcard" style="cursor:pointer" onclick=window.location.href="{{url('loan-panel')}}">
          <div class="card custom-card">
            <div class="card-body">
              <div class="d-flex flex-wrap align-items-top">
                <div class="mr-3 panel-icon lh-1">
                  <img src="{{asset('dist/img/home_icons/loan-lenders-certificate.png')}}" alt="loan">
              </div>
              <hr>
              <div>
                  <h5 class="mb-1">Loan Lenders Certificate</h5>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="col-sm-6 panelcard" style="cursor:pointer">
  <div class="card custom-card">
    <div class="card-body">
      <div class="d-flex flex-wrap align-items-top">
        <div class="mr-3 panel-icon lh-1">
          <img src="{{asset('dist/img/home_icons/loan-lenders-letter.png')}}" alt="Credit Card">
      </div>
      <hr>
      <div>
          <h5 class="mb-1">Lenders Authorization Letter</h5>
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


</div>


<div class="col-2">

  <div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12 text-center">
              <div class="card custom-card card-primary overflow-hidden">
                <div class="card-header">
                  <h3 class="card-title">Promotions</h3>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-sm-12 col-offset-1 panelcard" style="cursor:pointer" onclick=window.location.href="{{url('loan-panel')}}">
          <div class="card custom-card">
            <div class="card-body">
              <div class="d-flex flex-wrap align-items-top">
                <div class="mr-3 panel-icon lh-1">
                  <img src="{{asset('dist/img/home_icons/banners.gif')}}" width="64px" alt="loan">
              </div>
              <hr>
              <div>
                  <h5 class="mb-1">Banners</h5>
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


</div>


<!--<div class="col-2">-->
    <!--  <div class="card custom-card card-primary overflow-hidden">-->
        <!--    <div class="card-header">-->
            <!--      <h3 class="card-title">Promotions</h3>-->
            <!--  </div>-->
            <!--  <div class="card-body">-->
                <!--      <div class="row">-->
                    <!--        <div class="col-12 text-center">-->
                        <!--          <a href="/index.php?path=promotion&method=categories#" target="_blank">-->
                            <!--            <img src="{{asset('dist/img/home_icons/banners.gif')}}" width="64px" alt="hoogmoney"><br>-->
                            <!--            <strong class="text-dark">Banners</strong>-->
                            <!--        </a>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <div class="col-12">&nbsp;</div>
                        </div>
                        <div class="row">

                        </div>



                        <!--duplicate entry-->


                        <div class="row">
                            <div class="col-12">&nbsp;</div>
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
                                <!--   <a class="nav-link text-dark" id="vert-tabs-hoog-money-tab" data-toggle="pill" href="#vert-tabs-hoog-money" role="tab" aria-controls="vert-tabs-hoog-money" aria-selected="false">
                                      Hoog-Money <span class="float-right badge badge-warning">Annexure - HMoC</span>
                                  </a> -->
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
    <div class="col-12" id="loan_list"><div class="card custom-card card-primary">
      <div class="card-header justify-content-between">
        <div class="card-title">Loan Leads</div>
        <a href="?data_show=list" class="btn btn-sm btn-success" style="margin-left: 10px;">View All</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th style="width: 5%">#File No.</th>
              <th style="width: 10%">Loan</th>
              <th style="width: 5%">Loan Mode</th>
              <th style="width: 20%">Applicant Name</th>
              <th style="width: 20%">Subscriber</th>
              <th style="width: 5%">Phone No.</th>
              <th style="width: 10%">Email</th>
              <th style="width: 5%">Review.</th>
              <th style="width: 10%">Status</th>
              <!-- <th style="width: 5%">Action</th> -->
          </tr>
      </thead>
      <tbody>
        @foreach($applications as $record)
        <tr>
            <td>{{$record->id}}</td>
          <td>
           {{$record->loan_name ?? ''}} 
              <br>Rs {{$record->requested_amount ?? 0}}</td>
          <td>New</td>
          <td>{{$record->first_name ?? ''}} {{$record->middle_name ?? ''}} {{$record->last_name ?? ''}}<br>
            <small><strong>Applied On</strong> {{$record->created_at->format('d/m/Y')}}</small><br>
            <small><strong>First Document Upload</strong> 13/10/2023</small><br>
            <small><strong>Last Document Upload</strong> 13/10/2023</small>
        </td>
        <td>
          @if(Auth::user()->id==$record->agent_id)
              Your Client
              @else
              {{$record->agent_first." ".$record->agent_last}}
              @endif
        </td>


        <td>{{$record->mobile_number ?? ''}}</td>
        <td>{{$record->email ?? ''}}</td>
        <td>Review Not Submited</td>
        <td>
          @if($record->status=='PDC')
          <span class="badge bg-indigo">PD-C</span>
          @elseif($record->status=='Login')
          <span class="badge bg-warning">{{$record->status}}</span>
          @elseif($record->status=='Process')
          <span class="badge bg-warning">Processing</span>
          @elseif($record->status=='Disbursement')
          <span class="badge bg-success">Disbursement</span>
          @elseif($record->status=='Cancel')
          <span class="badge bg-danger">Cancelled</span>
          @endif
        </td>

    </tr>
    @endforeach
    
</tbody>
</table>
</div>
</div></div>
</div>
</div>
</section>

@endsection