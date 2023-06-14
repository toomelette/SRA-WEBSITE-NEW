<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Officials | SRA</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @include('layouts.constra-css-plugins')

</head>
<body>
<div class="body-inner">

  @include('layouts.constra-topnav')

  <div id="banner-area" class="banner-area" style="background-image:url({{asset('constra/images/slider-main/bg2_new.jpg')}})">
    <div class="banner-text">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="banner-heading">
              <h1 class="banner-title">Officials</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item active" aria-current="page">About Us</li>
                  <li class="breadcrumb-item active" aria-current="page">Officials</li>
                </ol>
              </nav>
            </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Banner text end -->
  </div><!-- Banner area end -->

  <section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="column-title" style="text-align: center">Sugar Board</h3>
          <p></p>
          <div class="container" style="text-align: center">
            <table width="100%">
              <tbody>
              <tr>
                <td valign="top">&nbsp;
                  <a href="{{asset("constra/images/officials/BBM-pic.png")}}"> <img src="{{asset('constra/images/officials/BBM-pic.png')}}" alt="" width="170" height="166"></td>
              </tr>
              <tr>
                <td style="text-align: center;" width="198" valign="top">
                  <p align="center"><strong style="color: black">President FERDINAND “Bongbong” R. MARCOS, Jr.&nbsp;</strong><br>
                    DA Secretary</p>
                  <p><u><a href="mailto:osec@da.gov.ph">osec@da.gov.ph</a></u><br>
                    <a href="Https://www.facebook.com/dacentralphilippines" target="_blank">DA Facebook</a><br>
                    (632) 8928-8741 to 64 / (632) 8273-2474</p>
                </td>
              </tr>
              </tbody>
            </table><br>

            <table width="100%">
              <tbody>
              <tr>
                <td valign="top">&nbsp;
                  <a href="{{asset("constra/images/administrators/PABLO LUIS S. AZCONA.png")}}"><img src="{{asset('constra/images/administrators/PABLO LUIS S. AZCONA.png')}}" alt="" width="150" height="166"></td>
              </tr>
              <tr>
                <td style="text-align: center;" width="198" valign="top">
                  <p align="center"><strong style="color: black">PABLO LUIS S. AZCONA</strong><br>
                    Acting Administrator and CEO</p>
                  <p><u><a href="mailto:srahead@sra.gov.ph">srahead@sra.gov.ph</a><br></u>
                    (632) 8926-2928 / (632) 8929-3633</p>
                </td>
              </tr>
              </tbody>
            </table>

            <section id="main-container" class="main-container">
              <div class="container">
                <div class="row text-center">

                  <div class="col-lg-6 col-md-4 col-sm-6 mb-5">
                    <div class="ts-team-wrapper">
                      <div class="team-img-wrapper">
{{--                        <a href="{{asset("constra/images/officials/BM-Azcona.png")}}"><img width="150" loading="lazy" src="{{asset("constra/images/officials/BM-Azcona.png")}}" class="img-fluid" alt="team-img"></a>--}}
                      </div>
                      <div class="ts-team-content-classic" style="text-align: center;" width=" 198" >
{{--                        <p align="center"><strong class="ts-name">PABLO LUIS S. AZCONA</strong><br>--}}
                        Board Member-Planter's Representative</p>
                        <p><u><a href="mailto:board.planter@sra.gov.ph">board.planter@sra.gov.ph</a></u><br></p>
                      </div>
                    </div>
                    <!--/ Team wrapper 3 end -->
                  </div><!-- Col end -->

                  <div class="col-lg-6 col-md-4 col-sm-6 mb-5">
                    <div class="ts-team-wrapper">
                      <div class="team-img-wrapper">
                        <a href="{{asset("constra/images/officials/BM-Mangwag.png")}}"><img width="150" loading="lazy" src="{{asset("constra/images/officials/BM-Mangwag.png")}}" class="img-fluid" alt="team-img"></a>
                      </div>
                      <div class="ts-team-content-classic" style="text-align: center;" width=" 198" >
                        <p align="center"><strong class="ts-name">MA. MITZI V. MANGWAG</strong><br>
                          Board Member-Miller's Representative</p>
                        <u><p><a href="mailto:board.miller@sra.gov.ph">board.miller@sra.gov.ph</a><br></p></u>
                      </div>
                    </div>
                    <!--/ Team wrapper 3 end -->
                  </div><!-- Col end -->




                </div><!-- Content row end -->

              </div><!-- Container end -->
            </section><!-- Main container end -->

{{--            <table width="100%">--}}
{{--              <tbody>--}}
{{--              <tr>--}}
{{--                <td valign="top">&nbsp;<img src="{{asset('constra/images/officials/Atty.-Nene.png')}}" alt="" width="160" height="166"></td>--}}
{{--              </tr>--}}
{{--              <tr>--}}
{{--                <td style="text-align: center;" width="198" valign="top">--}}
{{--                  <p align="center"><strong>ATTY. IGNACIO S. SANTILLANA&nbsp;</strong><br>--}}
{{--                    OIC-SRA Administrator</p>--}}
{{--                  <p><a href="mailto:srahead@sra.gov.ph">srahead@sra.gov.ph</a><br>--}}
{{--                    (632) 3455-3376 / (632) 3455-2135 / (632) 8929-3633</p>--}}
{{--                </td>--}}
{{--              </tr>--}}
{{--              </tbody>--}}
{{--            </table>--}}
          </div>

          <div class="accordion accordion-group" id="our-values-accordion">
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    DEPUTY ADMINISTRATORS
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                <div class="card-body" style="text-align: center">
                  <table width="100%">
                    <tbody>
                    <tr>
                      <td width="198" valign="top">&nbsp;<img src="{{asset('constra/images/officials/Atty.-Bran.png')}}" alt="" style="width: 100%; height: 190px; object-fit: cover; ">
                        <p align="center"><strong>ATTY. BRANDO D. NOROÑA</strong></p>
                        <p align="center">Deputy Administrator for Administration and Finance</p>
                        <pre>Email: <a href="mailto:dep.adm.afd@sra.gov.ph"> dep.adm.afd@sra.gov.ph</a></pre>
                        <pre>(632)8929-7187</pre>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                      <td width="198" valign="top">&nbsp;<img src="{{asset('constra/images/officials/Atty.-Nene.png')}}" alt="" width="160" height="166">
                        <p align="center"><strong>ATTY. IGNACIO S. SANTILLANA</strong></p>
                        <p align="center">Deputy Administrator for Research, Development and Extension Department</p>
                        <pre>Email: <a href="mailto:dep.adm.rde@sra.gov.ph"> dep.adm.rde@sra.gov.ph</a></pre>
                        <pre>(632)3455-8615</pre></td>
                    </tr>
                    </tbody>
                  </table>
                  <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                      <td width="198" valign="top">&nbsp;<img src="{{asset('constra/images/officials/Atty.-Third.png')}}" alt="" width="160" height="166">
                        <p align="center"><strong>ATTY. GUILLERMO C. TEJIDA, III</strong></p>
                        <p align="center">Deputy Administrator for Regulations</p>
                        <pre>Email: <a href="mailto:dep.adm.rd@sra.gov.ph"> dep.adm.rd@sra.gov.ph</a></pre>
                        <pre>(632)8926-4493/ (632)8929-9223</pre></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    OFFICE OF THE ADMINISTRATOR
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                <div class="card-body">
                  <div class="container">
                    <h5>INTERNAL AUDIT DEPARTMENT</h5>
                    <table style="text-align: center" cellspacing="0" cellpadding="0" border="0">
                      <tbody>
                      <tr>
                        <td width="234"><strong>NAME</strong></td>
                        <td width="301"><strong>POSITION/DESIGNATION</strong></td>
                        <td width="192"><strong>EMAIL</strong></td>
                        <td width="218"><strong>CONTACT NUMBER</strong></td>
                      </tr>
                      <tr>
                        <td width="234" valign="top"><strong><strong>Jay Andrew T. Adrias</strong></strong></td>
                        <td width="301" valign="top">Department Manager III, Internal Audit Department</td>
                        <td width="192" valign="top">iad_mgr@sra.gov.ph/</td>
                        <td width="218" valign="top">(632)8929-6131<b></b></td>
                      </tr>
                      <tr>
                        <td width="234" valign="top"><strong><strong>Sarah Jean P. Clemente</strong></strong></td>
                        <td width="301" valign="top">OIC, Operations Audit Division</td>
                        <td width="192" valign="top">iad_mgr@sra.gov.ph/</td>
                        <td width="218" valign="top">(632)8929-6131<b></b></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="container mt-4">
                    <h5>LEGAL DEPARTMENT</h5>
                    <table style="text-align: center" cellspacing="0" cellpadding="0" border="0">
                      <tbody>
                      <tr>
                        <td width="234"><strong>NAME</strong></td>
                        <td width="301"><strong>POSITION/DESIGNATION</strong></td>
                        <td width="192"><strong>EMAIL</strong></td>
                        <td width="218"><strong>CONTACT NUMBER</strong></td>
                      </tr>
                      <tr>
                        <td width="234" valign="top"><strong>Atty. Ronald E. Rimando</strong></td>
                        <td width="301" valign="top">Department Manager III, Legal Department</td>
                        <td width="192" valign="top">legal@sra.gov.ph/ legal_vis@sra.gov.ph</td>
                        <td width="218" valign="top">(632)8236-0063 / (034)-434-8760 / (6334)435-3759</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="container mt-4">
                    <h5>PLANNING, POLICY AND SPECIAL PROJECTS DEPARTMENT</h5>
                    <table style="text-align: center" cellspacing="0" cellpadding="0" border="0">
                      <tbody>
                      <tr>
                        <td width="234"><strong>NAME</strong></td>
                        <td width="301"><strong>POSITION/DESIGNATION</strong></td>
                        <td width="192"><strong>EMAIL</strong></td>
                        <td width="218"><strong>CONTACT NUMBER</strong></td>
                      </tr>
                      <tr>
                        <td width="234" valign="top"><strong>Digna D. Gonzales</strong>
                          <b></b></td>
                        <td width="301" valign="top">OIC – Planning, Policy and Special Projects Department</td>
                        <td width="192" valign="top">ppspdsra@gmail.com / ppspdsra@sra.gov.ph</td>
                        <td width="218" valign="top">(632)8929-6137/ (632)3455-0446</td>
                      </tr>
                      <tr>
                        <td width="234" valign="top"><strong>Digna D. Gonzales
                          </strong><b></b></td>
                        <td width="301" valign="top">OIC – Planning Policy and Programming Division</td>
                        <td width="192" valign="top">mis@sra.gov.ph</td>
                        <td width="218" valign="top">(632)3455-4521</td>
                      </tr>
                      <tr>
                        <td width="234" valign="top"><strong>Alex John R. Galicia</strong></td>
                        <td width="301" valign="top">OIC – Special Projects, Project Development, Evaluation and Monitoring Division</td>
                        <td width="192" valign="top">sppdemd@sra.gov.ph</td>
                        <td width="218" valign="top">(632)3455-0446</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    ADMINISTRATIVE AND FINANCE DEPARTMENT
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                <div class="card-body">
                  <div class="container">
                    <h5>OFFICE OF THE DEPUTY ADMINISTRATOR FOR ADMINISTRATION AND FINANCE</h5>
                    <table style="text-align: center" width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tbody>
                      <tr>
                        <td width="234"><strong>NAME</strong></td>
                        <td width="301"><strong>POSITION/DESIGNATION</strong></td>
                        <td width="192"><strong>EMAIL</strong></td>
                        <td width="218"><strong>CONTACT NUMBER</strong></td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Atty. Brando D. Noroña</strong></td>
                        <td width="301">Deputy Administrator for Administration &amp; Finance</td>
                        <td width="192">dep.adm.afd@sra.gov.ph</td>
                        <td width="218">(632)8929-7187<b></b></td>
                      </tr>
                      <tr>
                        <td colspan="4" width="945">
                          <p align="center"><strong>(Luzon and Mindanao Area)</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Erlinda J. Abacan, CPA</strong></td>
                        <td width="301">OIC – Department Manager III, Administrative &amp; Finance Department (Luzon &amp; Mindanao Area)</td>
                        <td width="192">afd_mgr@sra.gov.ph</td>
                        <td width="218">(632)8926-6471/(632)3455-7656<b></b></td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Narciso R. Cabalquinto, Jr</strong></td>
                        <td width="301">OIC – General Administrative Division (Luzon &amp; Mindanao Area)</td>
                        <td width="192">hrd_gsd@sra.gov.ph<b></b></td>
                        <td width="218">(632)3455-3524<b></b></td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Concepcion C. Ruby</strong></td>
                        <td width="301">OIC – Human Resource Management Officer IV (Luzon &amp; Mindanao Area)</td>
                        <td width="192">hrd_gsd@sra.gov.ph<b></b></td>
                        <td width="218">(632)3455-3524<b></b></td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Erlinda J. Abacan, CPA</strong></td>
                        <td width="301">Chief Accountant, Accounting Division (Luzon &amp; Mindanao Area)</td>
                        <td width="192">acctg@sra.gov.ph<b></b></td>
                        <td width="218">(632)3455-2336<b></b></td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Resty D. Reano, CPA</strong><b></b></td>
                        <td width="301">OIC – Budget &amp; Treasury Division (Luzon &amp; Mindanao Area)</td>
                        <td width="192">budgettreasury@sra.gov.ph<b></b></td>
                        <td width="218">(632)8236-0009<b></b></td>
                      </tr>
                      <tr>
                        <td colspan="4" width="945">
                          <p align="center"><strong>(Visayas Area)</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Engr. Dorothy B. Rodgrigo</strong></td>
                        <td width="301">OIC – Administrative &amp; Finance Department (Visayas Area)</td>
                        <td width="192">afd_vis@sra.gov.ph</td>
                        <td width="218">(6334)435-3557<b></b></td>
                      </tr>
                      <tr>
                        <td width="234"></td>
                        <td width="301">General Administrative Division (Visayas Area)</td>
                        <td width="192">admin_vis@sra.gov.ph</td>
                        <td width="218">(6334)435-3557</td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Engr. Dorothy B. Rodgrigo</strong></td>
                        <td width="301">Finance Division (Visayas Area) Property/Procurement/Bldg. &amp; Transport Maintenance Section</td>
                        <td width="192">finance_vis@sra.gov.ph<b></b></td>
                        <td width="218">(6334)435-3759<b></b></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingFour">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    REGULATION DEPARTMENT
                  </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#our-values-accordion">
                <div class="card-body">
                  <div class="container">
                    <h5>OFFICE OF THE DEPUTY ADMINISTRATOR FOR REGULATIONS</h5>
                    <table style="text-align: center" width="100%" cellpadding="0" border="0">
                      <tbody>
                      <tr>
                        <td width="234"><strong>NAME</strong></td>
                        <td width="301"><strong>POSITION/DESIGNATION</strong></td>
                        <td width="192"><strong>EMAIL</strong></td>
                        <td width="218"><strong>CONTACT NUMBER</strong></td>
                      </tr>
                      <tr>
                        <td width="232"><strong>Atty. Guillermo C. Tejida, III</strong></td>
                        <td width="291">Deputy Administrator for Regulations</td>
                        <td width="198">dep.adm.rd@sra.gov.ph</td>
                        <td width="224">(632)8926-4493/ (632)8929-9223</td>
                      </tr>
                      <tr>
                        <td width="232"><strong>Luisito C. Malagkit</strong></td>
                        <td width="291">Department Manager III, Regulation Department (Luzon &amp; Mindanao Area)</td>
                        <td width="198">rd_mgr@sra.gov.ph</td>
                        <td width="224">(632)8926-4493/ (632)8929-9223</td>
                      </tr>
                      <tr>
                        <td colspan="4" width="945">
                          <p align="center"><strong>(Luzon and Mindanao Area)</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td width="232"><strong><strong>Ian A. Pedalizo</strong>
                          </strong><b></b></td>
                        <td width="291">OIC – Sugar Transaction Division (Luzon &amp; Mindanao Area)</td>
                        <td width="198">sug_transact@sra.gov.ph</td>
                        <td width="224">(632)3455-7592/ (632)8926-4493</td>
                      </tr>
                      <tr>
                        <td width="232"><strong>Rondell Ray D. Manjarres</strong></td>
                        <td width="291">OIC – Licensing &amp; Monitoring Division (Luzon &amp; Mindanao Area)</td>
                        <td width="198">licensing-monitoring@sra.gov.ph</td>
                        <td width="224">(632)3455-8340</td>
                      </tr>
                      <tr>
                        <td width="232"><strong>Arnulfo L. Jacobe</strong></td>
                        <td width="291">OIC – Sugar Regulation &amp; Enforcement Division (Luzon &amp; Mindanao Area)</td>
                        <td width="198">sred@sra.gov.ph</td>
                        <td width="224">(632)3455-0793</td>
                      </tr>
                      <tr>
                        <td colspan="4" width="945">
                          <p align="center"><strong>(Visayas Area)</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td width="232"><strong>Joenel N. Elbanbuena</strong></td>
                        <td width="291">OIC – Regulation Department (Visayas Area)</td>
                        <td width="198">rd_managervis@sra.gov.ph</td>
                        <td width="224">(6334)434-1470&nbsp;/ (034)-435-3755 / (034)-435-3139</td>
                      </tr>
                      <tr>
                        <td width="232"><strong>Ivy C. Cababasay</strong></td>
                        <td width="291">OIC – Licensing &amp; Monitoring Division (Visayas Area)</td>
                        <td width="198">lmdvis@sra.gov.ph</td>
                        <td width="224">(6334)434-1470<b></b></td>
                      </tr>
                      <tr>
                        <td width="232"><strong>Maricris A. Rojo</strong></td>
                        <td width="291">OIC – Sugar Regulation &amp; Enforcement Division (Visayas Area)</td>
                        <td width="198">sred_vis@sra.gov.ph</td>
                        <td width="224">(6334)434-1470<b></b></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-0 bg-transparent" id="headingFive">
                <h2 class="mb-0">
                  <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    RESEARCH DEVELOPMENT AND EXTENSION DEPARTMENT
                  </button>
                </h2>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#our-values-accordion">
                <div class="card-body">
                  <div class="container">
                    <h5>OFFICE OF THE DEPUTY ADMINISTRATOR FOR RESEARCH, DEVELOPMENT AND EXTENSION</h5>
                    <table style="text-align: center;" width="100%" cellpadding="0" border="0">
                      <tbody>
                      <tr>
                        <td width="234"><strong>NAME</strong></td>
                        <td width="301"><strong>POSITION/DESIGNATION</strong></td>
                        <td width="192"><strong>EMAIL</strong></td>
                        <td width="218"><strong>CONTACT NUMBER</strong></td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Atty. Ignacio S. Santillana</strong></td>
                        <td width="244">Deputy Administrator for Research, Development &amp; Extension Department</td>
                        <td width="238">dep.adm.rde@sra.gov.ph</td>
                        <td width="229">(632)3455-8615</td>
                      </tr>
                      <tr>
                        <td colspan="4" width="945">
                          <p align="center"><strong>(Luzon and Mindanao Area)</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Engr. Laverne C. Olalia
                          </strong><b></b></td>
                        <td width="244">OIC – Research, Development &amp; Extension Department (Luzon &amp; Mindanao)</td>
                        <td width="238">rde_mgr@sra.gov.ph</td>
                        <td width="229">(632)8236-0001</td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Marietta Dina Padilla-Fernandez</strong><b></b></td>
                        <td width="244">Chief – Extension Services Division (Luzon &amp; Mindanao)</td>
                        <td width="238">extn_off@sra.gov.ph</td>
                        <td width="229">(632)8929-6135</td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Engr. Laverne C. Olalia</strong></td>
                        <td width="244">OIC – Research &amp; Laboratory Division (LAREC)</td>
                        <td width="238">larec@sra.gov.ph</td>
                        <td width="229">(6345)970-0795</td>
                      </tr>
                      <tr>
                        <td colspan="4" width="945">
                          <p align="center"><strong>(Visayas Area)</strong></p>
                        </td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Ma. Lourdes I. Dormido</strong></td>
                        <td width="244">OIC – Research, Development &amp; Extension Department (Visayas Area)</td>
                        <td width="238">rde_managervis@sra.gov.ph</td>
                        <td width="229">(6334)433-6887<b></b></td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Helen B. Lobaton&nbsp;</strong></td>
                        <td width="244">OIC – Extension &amp; Technical Services Division (Visayas Area)</td>
                        <td width="238">extn_vis@sra.gov.ph</td>
                        <td width="229">(6334)433-6887 / (6334)713-2147</td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Rimmon T. Armones</strong></td>
                        <td width="244">OIC – Chief Science Research Specialist, Research &amp; Laboratory Division (LGAREC)</td>
                        <td width="238">&nbsp;lab_lgarec@sra.gov.ph</td>
                        <td width="229">(6334)735-0141</td>
                      </tr>
                      <tr>
                        <td width="234"><strong>Rimmon T. Armones</strong></td>
                        <td width="244">OIC – Chief Science Research Specialist, Agricultural Support Services Division</td>
                        <td width="238">&nbsp;lab_lgarec@sra.gov.ph</td>
                        <td width="229">(6334)702-9031</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Accordion end -->

        </div><!-- Col end -->
      </div><!-- Content row end -->

    </div><!-- Container end -->
  </section><!-- Main container end -->

  @include('layouts.constra-footer')

@include('layouts.constra-js-plugins')
@yield('scripts')

  <script type="text/javascript">
    function viewNav(routE){
      window.open("{{route('navRoute')}}".replace('navRoute', routE),'_blank').focus();
    }
  </script>

</div><!-- Body inner end -->
</body>

</html>
