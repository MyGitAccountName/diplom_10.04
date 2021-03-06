<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Тесты';
//$this->registerCssFile("css/svg.css");
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-test">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <div id="banners" class="carousel slide" data-interval="false" data-ride="carousel" data-pause="hover">
       <!-- <div id="banners" class="carousel slide" data-ride="carousel">    -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!--<img class="d-block h-20" src="./../pic/svg/1.jpg" alt="First slide">-->

                <svg width="580" height="400" xmlns="http://www.w3.org/2000/svg">
                    <!-- Created with SVG Editor - http://github.com/mzalive/SVG Editor/ -->
                    <g>
                        <title>background</title>
                        <rect fill="#0f8c63" id="canvas_background" height="402" width="582" y="-1" x="-1"/>
                        <g display="none" overflow="visible" y="0" x="0" height="100%" width="100%" id="canvasGrid">
                            <rect fill="url(#gridpattern)" stroke-width="0" y="0" x="0" height="100%" width="100%"/>
                        </g>
                    </g>
                    <g>
                        <title>Layer 1</title>
                        <path class="path path1" id="path1" d="m111.5,115.450012c0,-1 -0.382683,-2.076118 0,-3c0.541199,-1.306564 1.173096,-2.85273 2,-4c1.307449,-1.813995 1.458801,-2.693436 2,-4c0.382683,-0.923882 1.173096,-1.85273 2,-3c1.307449,-1.813995 2,-2 3,-3c1,-1 2.026749,-1.770248 3,-2c2.176254,-0.513741 3,-2 5,-2c1,0 1.693436,-1.458801 3,-2c1.847763,-0.765366 3,0 4,0c1,0 2,0 3,0c1,0 2,1 3,2c1,1 2,3 3,4c1,1 2,2 2,3c0,1 1,1 1,3c0,1 1,2 1,3c0,1 0,2 0,4c0,1 0.229752,3.026749 0,4c-0.513748,2.176254 -0.692551,4.186005 -2,6c-0.826904,1.14727 -1.097885,2.824432 -3,4c-0.850647,0.525734 -2,2 -4,4c-1,1 -3,2 -4,3c-1,1 -2.70546,1.346191 -5,3c-1.813995,1.307449 -3.85273,2.173096 -5,3c-1.813995,1.307449 -3.693436,2.458801 -5,3c-0.923882,0.38269 -2,1 -3,1c-1,0 -1,1 -1,0c0,-1 1,-1 2,-2c1,-1 3,-2 4,-2c1,0 3,0 5,0c2,0 4.878555,0.493454 8,1c0.987091,0.160187 2.152237,-0.765366 4,0c1.306564,0.541199 2,1 3,2c1,1 2.076126,1.61731 3,2c1.306564,0.541199 0.692551,2.186005 2,4c0.826904,1.147263 1.770248,3.026749 2,4c0.513748,2.176254 2.496231,4.907791 3,9c0.24437,1.985016 1,5 1,8c0,2 0,5 0,6c0,2 0,5 0,6c0,2 0,4 0,7c0,2 -1.789856,4.07843 -3,7c-0.855713,2.065857 -2.415894,3.761078 -4,7c-1.389359,2.840729 -3,5 -4,7c-1,2 -3,4 -5,6c-1,1 -2.693436,1.458801 -4,2c-0.923874,0.38269 -3.186005,-0.307449 -5,1c-1.14727,0.826904 -3,1 -5,1c-1,0 -4.026749,-0.770248 -5,-1c-2.176254,-0.513748 -3.026749,-0.770248 -4,-1c-2.176254,-0.513748 -2.386871,-1.917603 -5,-3c-0.923882,-0.38269 -2.076118,-0.61731 -3,-1c-1.306564,-0.541199 -2.418861,-1.418854 -4,-3c-1.581139,-1.581146 -1.617317,-3.076126 -2,-4c-0.541199,-1.306564 -1,-2 -2,-2l0,-1l-1,0l0,-1" stroke-width="10" stroke="#f1f5f3" fill="none"/>
                        <path class="path path2" id="path2" d="m189.5,146.450012c1,0 2,0 4,0c4,0 10.962601,0.499374 21,1c10.986343,0.547943 20,0 28,0c7,0 12,0 15,0l2,0" stroke-width="10" stroke="#f1f5f3" fill="none"/>
                        <path class="path path3" id="path3" d="m228.5,114.450012c0,1 0,2 0,3c0,2 0,5 0,8c0,4 1,9 1,14c0,5 0,11 0,16c0,3 0,6 0,9c0,3 0,4 0,6l0,1l0,1l0,1" stroke-width="10" stroke="#f1f5f3" fill="none"/>
                        <path class="path path4" id="path4" d="m297.5,93.450012c0,1 0.247437,2.010223 0,5c-0.501709,6.062035 -2.414795,12.907585 -4,21c-1.359283,6.939186 -2.990234,12.790253 -4,20c-0.693512,4.951675 -0.61731,8.076126 -1,9c-0.541199,1.306564 -2,3 -2,4c0,2 -1,2 -1,3c0,1 -1.707092,1.292892 -1,2c0.707092,0.707108 2,0 3,0c3,0 6,-1 11,-1c6,0 11,-1 16,-1c4,0 8,-1 10,-1c2,0 3,-1 5,-1c1,0 1,-1 1,-2c0,-1 0,-4 0,-7c0,-2 0,-4 0,-6c0,-2 0.458801,-2.693436 1,-4c0.38269,-0.923874 2,-4 0,-4c-1,0 0,2 0,6c0,6 -0.499481,12.965988 -1,24c-0.407837,8.990753 0.499573,19.968811 1,32c0.290924,6.993958 1,14 1,17l0,1" stroke-width="10" stroke="#f1f5f3" fill="none"/>
                        <path class="path path5" id="path5" d="m367.5,137.450012c1,0 2,0 6,0c17,0 34,0 52,-2c18,-2 30,-4 37,-5l2,0" stroke-width="10" stroke="#f1f5f3" fill="none"/>
                        <path class="path path6" id="path6" d="m385.5,169.450012c0,-1 1,-1 5,-1c7,0 15.965973,-0.499481 27,-1c7.991791,-0.362518 15,0 22,0c7,0 13,0 20,0l2,-1l1,0" stroke-width="10" stroke="#f1f5f3" fill="none"/>
                        <path class="path path7" id="path7" d="m480.5,90.450012c1,0 3.010712,-0.3871 10,0c9.041534,0.500763 21,1 33,1c12,0 20.937988,-1.498291 27,-2c1.993164,-0.164963 2.38269,1.076118 2,2c-0.541199,1.306564 -2.465515,2.838089 -4,8c-2.905884,9.775261 -4.041382,19.996315 -5,31c-1.045105,11.996155 -3.59436,25.006332 -4,38c-0.500244,16.023407 -2.497559,23.925797 -3,29c-0.197083,1.990265 0,4 0,5c0,1 -1,1 -1,2l0,1l0,1" stroke-width="10" stroke="#f1f5f3" fill="none"/>
                        <path class="path path8" id="path8" d="m508.5,148.450012c1,0 2,0 5,0c7,0 15,1 21,1c7,0 12,1 14,1c1,0 2,0 3,0c1,0 2,0 3,0c1,0 2,0 3,0l1,0" stroke-width="10" stroke="#f1f5f3" fill="none"/>
                    </g>
                </svg>

                <div class="carousel-caption d-none d-md-block">
                    <h5>Первый</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block h-20" src="./../pic/svg/2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Второй</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block h-20" src="./../pic/svg/3.png" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Третий</h5>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#banners" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#banners" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
