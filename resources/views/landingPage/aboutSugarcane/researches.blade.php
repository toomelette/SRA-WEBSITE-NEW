<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Researches | SRA</title>

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
                            <h1 class="banner-title">Researches</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item active" aria-current="page">About Sugarcane</li>
                                    <li class="breadcrumb-item active" aria-current="page">Researches</li>
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
                    <h2>Abstract of Completed Researches</h2><hr>
                </div>
                <div class="col-lg-12 mt-4 mt-lg-0">
                    <!--<h3 class="into-sub-title">Our Values</h3>
                    <p>Minim Austin 3 wolf moon scenester aesthetic, umami odio pariatur bitters. Pop-up occaecat taxidermy street art, tattooed beard literally.</p>-->

                    <div class="accordion accordion-group" id="our-values-accordion">
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Abstract of completed researches (2022)
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                                <div class="card-body">

                                    <embed style="border: 10px solid green;" src="{{asset('constra/files/ResearchesAbstract/ABSTRACT-OF-COMPLETED-RESEARCHES-(2022).pdf#toolbar=0')}}" width="100%" height="600px"/>
{{--                                    <ol>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Raw Sugar Production by Month, Area, Yield per Hectare</a></u> - 1st Qtr</li>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Refined Sugar Production by Month</a></u> - 1st Qtr</li>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Raw Sugar (Domestic) Withdrawals by Month</a></u> - 1st Qtr</li>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Refined Sugar Withdrawals by Month</a></u> - 1st Qtr</li>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Monthly Average Millsite Prices of Raw Sugar and Molasses</a></u> - as of May 15, 2022</li>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Monthly Average Sugar Prices in Metro Manila</a></u> - 1st Qtr</li>--}}
{{--                                    </ol>--}}
                                </div>
                            </div>
                        </div>

                        <div class="card">{{--start--}}
                        <div class="card-header p-0 bg-transparent" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Abstract of completed researches (2021)
                                </button>
                            </h2>
                        </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                                <div class="card-body">
                                    <embed style="border: 10px solid green;" src="{{asset('constra/files/ResearchesAbstract/ABSTRACT-OF-COMPLETED-RESEARCHES-(2021).pdf#toolbar=0')}}" width="100%" height="600px"/>

                                    {{--                                    <ol style="list-style-type: upper-alpha" class="text-justify">--}}
{{--A--}}{{--                    <li>Variety Improvement and Pest Management</li>--}}
{{--                                        <ul style="list-style-type: -moz-ethiopic-numeric">--}}
{{--1--}}{{--                                   <li>Preliminary Yield test of Phil 2015 series varieties R. Sarol, MV. Serrano</li>--}}
{{--                                                <p>Thirty test clones of Phil 2015 row test series from LAGAREC were entered in the preliminary yield test at LAREC using RCBD to compare their agronomic and yield potential with two check varieties, Phil 8013 and Phil 7544, under natural field condition at LAREC.</p>--}}
{{--                                                <p>Based on sugar yield, nine clones were found to be either significantly higher to one of the check varieties or comparable to one or both check varieties, Phil 8013 and Phil 7544. The clones also passed the selection criteria for disease resistance to smut and downy mildew.</p>--}}
{{--                                                <p>he clones which are recommended to undergo ECOTEST/NCT are Phil 2015-0533, Phil 2015-0435, Phil 2015-0821, Phil 2015-0867, Phil 2015-1181, Phil 2015-0489, Phil 2015-0125, Phil 2015-0121, Phil 2015-0217</p>--}}
{{--2--}}{{--                                   <li>Screening of selected Phil 2014 series varieties for resistance to downy mildew A. Casupanan, J. Vicente, MV. Serrano</li>--}}
{{--                                                <p>Fifteen clones from the Phil 2014 series varieties and two check varieties were screened and evaluated for resistance to sugarcane downy mildew in the plant and ratoon canes.</p>--}}
{{--                                                <p>Among the fifteen clones of Phil 2014 series, fourteen test clones were rated very highly resistant to resistant to resistant: Phil 14-0013, Phil 14-0417, Phil 14-0393, Phil 14-0243, Phil 14-0919 and Phil 14- 1057 were very highly resistant; Phil 14-0005, Phil 14-0009, Phil 14-0727, Phil 14-0747, Phil 14-0679, Phil 14-0267 and Phil 14-0983 were highly resistant; and Phil 14-0389 was resistant. Phil 14-0703 was rated intermediate average. Except for Phil 14-0703, all other test clones are recommended for agronomic testing may be further screened for the resistance to downy mildew.</p>--}}
{{--                                        </ul>--}}
{{--B--}}{{--                    <li>Production Technology and Crop Management (5)</li>--}}
{{--                                        <ul style="list-style-type: -moz-ethiopic-numeri">--}}
{{--1--}}{{--                                   <li>Yield Potential Assessment of Three Sugarcane Phil Varieties with Different Ages at Harvest under Agroclimatic Conditions of Pampanga Mill District, Philippines JA. Alviar, MV. Serrano</li>--}}
{{--                                                <p>This paper assessed the millable stalk attributes and cane and sugar yield of three sugarcane Phil varieties harvested at different age. A two-factor factorial in randomized complete block design with three levels of age at harvest (11, 12, and 13 months after planting) and three sugarcane varieties (Phil 2009-1867, Phil 2009-1969, and Phil 2010-0107) was laid out. All millable stalk attributes and yield component were collected at the harvest of each age. Regression analysis was done to determine possible causal relationship between climatic conditions and data gathered. The effect of climatic conditions was removed in all data except millable count using analysis of variance to consider only the effect of age at harvest per variety. The millable stalk attributes showed significant difference but still lead to comparable tonnage between the varieties. Only the stalk length showed difference due to continuous growth as an effect of adequate moisture during harvest. Sucrose content showed significant difference in between the varieties and age at harvest leading to significant differences of sugar yield value of 11 to 13 months after planting. Economic analysis showed that delaying the harvest of all varieties up to 13 months of planting showed significantly higher net income and ROI. The analysis of time equity indicated the time value at ripening stage is considerably more important to raise the net income of farmers than harvesting prematurely with low sugar output and starting another cropping season without optimizing the yield of the varieties.</p>--}}
{{--2--}}{{--                                   <li>Influence of Season of Planting to incidence of Sugarcane Smut host by Sporisorium scitamineum A. Casupanan, J. Vicente, R. Sarol, V. Serrano.</li>--}}
{{--                                                <p>This study was conducted to determine the influence of season of planting (early, mid- and late) to sugarcane smut infections of two varieties Phil 2004-0081 and Phil 2000-0881. Treatments were planted in 2×3 factorial in randomized complete block design (RCBD), with four replications. The early planting season started on the month of October, the mid-season on December, and the late season on February. Observation was done until the first ratoon.</p>--}}
{{--                                                <p>Significant differences were observed on smut incidence across seasons and varieties, but not on their interactions. At seven months of growth, highest smut incidence was observed from early planting season on both plant (26.75%) and ratoon canes (37.81%). Mid-season planting produced the lowest smut incidence in plant cane (3.96%), followed by late season (14.03%). In ratoon cane, smut incidence from mid- and late season of planting were not significantly different. The higher amount of rainfall on the two seasons was the primary reason for this result since this factor reduces the amount of teliospores</p>--}}
{{--                                                <p>in the atmosphere. In terms of varieties, Phil 2004-0081(9.96 – 15.45%) produced lower smut incidence compared to Phil 2000-0881 (34.79-46.74%).</p>--}}
{{--                                                <p>The smut infection minimally affects the stalk parameter and cane yield. However, it reduced the sucrose content which further influence the sugar content. Sugar yield was significantly different only on ratoon canes. Highest sugar was observed from the late season of planting (158.80 LKg/Ha), followed by mid- season (128.80 LKg/Ha) and early season (110.23 LKg/Ha), respectively. However, varieties have no significant effects on yield parameters.</p>--}}
{{--                                                <p>Thus, the climatic factors during the mid- and late season planting may not be conducive to smut infection. Planting of Phil 2004-0081 and Phil 2000-0881 may be done on December or February, when higher amount of rainfall is expected.</p>--}}
{{--3--}}{{--                                   <li>Influence of Plowing depths on cane and sugar yields of Phil 00-2569, Phil 06-1899 and Phil 06-2289 in Angeles Loamy Sand B. G. Manlapaz, R. D. Locaba, N. C. Guiyab, RJ. Sarol, and MV. A. Serrano</li>--}}
{{--                                                <p>A study was conducted to evaluate the influence of plowing depths on cane and sugar yield for Phil 00- 2569, Phil 06-1899, and Phil 06-2289 in Angeles Sandy Loam Soil. Treatments were as follows: (1) a 30 cm single pass with a disc plow (control), (2) a 40 cm single pass with a moldboard plow, (3) a 50 cm single pass with a ripper followed by a moldboard plow double pass, and (4) a 60 cm double pass with a ripper followed by a moldboard plow double pass. All the implements were pulled adequately by the 120 hp Ford tractor. After treatment application, two passes of the disc harrow were done before furrowing and planting.</p>--}}
{{--                                                <p>No significant differences and interactions were observed in the plant cane’s tonnage, sucrose content, and sugar yield, with most varieties having higher yields at 40 cm of plowing. However, significantly higher tonnage was observed in the ratoon using Phil 00-2569, on par with Phil 06-1899. Significantly higher tonnage values were obtained from 40 cm, which was comparable to tonnage at 50 cm depth. Furthermore, when growing canes up to the first ratoon using the treatments, it was observed that all varieties obtained higher costs of production as the depth of plowing increased. In terms of the net income, Phil 2000-2569 and Phil 2006-2289 had the highest net income at 40 cm of plowing, while Phil 2006-1899 was at a depth of 30 cm.</p>--}}
{{--                                                <p>However, the combined cost of production and net income of the varieties in both crop cycles at different plowing depths revealed that a depth of 30 cm, or approximately 12 inches (conventional), was still the most suitable for production since it obtained the highest ROI for all the varieties. A 60 cm plowing depth was the most impractical operation.</p>--}}
{{--4--}}{{--                                   <li>Canopy structure and light interception characteristics of HYVs in relation to yield R. Sarol, A. Alviar, MV. Serrano, B. Manlapaz</li>--}}
{{--                                                <p>Plant morphological studies such as canopy structure are very important in understanding plant mechanism performance in capturing solar energy to sustain growth and development and its responses to agro-climatic conditions. Six high-yielding sugarcane varieties, namely Phil 03-1727, Phil 06-2289, Phil 00-2569, Phil 99-1793, Phil 06-2289, and Phil 8013, were investigated under Angeles loamy sand at the Sugar Regulatory Administration-Luzon Agricultural Research and Extension Center, Paguiruan, Floridablanca, Pampanga in two cropping seasons. Varieties exhibited different leaf and canopy attributes. A strong correlation was observed between cane tonnage and PAR and LAI, moderately with CRC and TCO, weakly with leaf length and LIA. Sugar rendement is perfectly correlated with Brix was CRC, moderately were PAR and LAI, weakly with LIA. With Pol, moderately correlated were CRC and PAR, weakly with LAI and TCO. This suggests that varieties with low PAR, high LAI, CRC, and TCO should be considered when selecting for high yield. These characteristics would allow the leaves to</p>--}}
{{--                                                <p>intercept as much solar energy available to produce the required photosynthetic products to sustain growth and development to generate a high yield. Other attributes such as having long and broad leaves, including moderate inclination, also enhance the light interception ability of the canopy. Among the varieties, Phil 06-2289 and Phil 80-13 possessed most of the desirable traits mentioned implying that productivity is dependent on a well-structured canopy. The study provided a preliminary theoretical foundation and technical guidance in developing varieties. Variety performance, however, depends on the climatic condition and cultural practices in a locality. This emphasizes the importance of conducting more comprehensive morphological studies using several varieties at different climatic conditions and biotic and abiotic stresses.</p>--}}
{{--5--}}{{--                                   <li>Influence of drying period on the juice and yield quality of sugarcane as affected by moisture Benjamin G. Manlapaz, Rose Diane Locaba, Nestor C. Guiyab, Rachel J. Sarol, MV A. Serrano</li>--}}
{{--                                                <p>The study evaluates the influence of soil moisture drying period on cane juice and sugar yield quality of Phil 99-1793 after rainfall before harvesting in Angeles Sandy Loam Soil. Treatments were as follows: T1 – 0-day drying, T2 – 2-day drying, T3 – 4-day drying, T4 – 6-day drying, T5 – 8-day drying, T6 – 10-day drying, T7 – 12-day drying, T8 – 14-day drying. The soil moisture drying-period strategies influenced the volumetric moisture content of the soil and the Brix reading of the cane juice. However, it significantly influenced the percent polarity and the apparent purity of the cane juice. The TC/Ha was not considerably affected by days of drying period after the rainfall. The drying periods greatly influenced the L-Kg/TC and L-Kg/Ha were 0(control), 2, 4, and 6-day treatments significantly gave the highest sucrose content and sugar yield, respectively. Furthermore, the cost and return on investment of Phil 99-1793 at different days of the drying period after rainfall revealed that 2-, 4-, and 6-day was the ideal number of days of drying time after rainfall since they yielded the comparatively higher ROI of 0.74, 0.69, and 64 respectively.</p>--}}
{{--                                        </ul>--}}
{{--                                </ol>--}}
                            </div>
                        </div>
                    </div>{{--end--}}
                        <div class="card">{{--start--}}
                            <div class="card-header p-0 bg-transparent" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        ABSTRACT OF COMPLETED RESEARCHES (2020)
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                                <div class="card-body">

                                    <embed style="border: 10px solid green;" src="{{asset('constra/files/ResearchesAbstract/ABSTRACT-OF-COMPLETED-RESEARCHES-(2020).pdf#toolbar=0')}}" width="100%" height="600px"/>
{{--                                    <h5>Downloadable Files</h5>--}}
{{--                                    <ol>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Raw Sugar Production by Month, Area, Yield per Hectare</a></u></li>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Refined Sugar Production by Month</a></u></li>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Raw Sugar (Domestic) Withdrawals by Month</a></u></li>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Refined Sugar Withdrawals by Month</a></u></li>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Monthly Average Millsite Prices of Raw Sugar and Molasses</a></u></li>--}}
{{--                                        <li><u><a href="" style="color: #EA7919">Monthly Average Sugar Prices in Metro Manila</a></u></li>--}}
{{--                                    </ol>--}}
                                </div>
                            </div>
                        </div>{{--end--}}

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
