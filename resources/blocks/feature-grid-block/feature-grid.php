<?php

$boxes = get_field('boxes');

$heading = get_field('headline');

$content = get_field('content'); ?>



<div class="wp-block-group alignfull is-style-section-2 has-global-padding is-layout-constrained wp-block-group-is-layout-constrained is-style-section-2--1510f9b1213e4d1679e6e0d5ca86319c" style="margin-top:0;padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
    <div class="wp-block-group has-global-padding is-layout-constrained wp-container-core-group-is-layout-4 wp-block-group-is-layout-constrained" style="margin-bottom:var(--wp--preset--spacing--60)">
        <!-- <h2 class="wp-block-heading has-text-align-center" style="font-size:clamp(27.894px, 1.743rem + ((1vw - 6.4px) * 3.142), 48px);">Meet Powder</h2> -->
        <?= $heading ?>
        <?= qntm_acf_render($heading,  'wp-block-heading has-text-align-center', 'h3',  'style="font-size:clamp(27.894px, 1.743rem + ((1vw - 6.4px) * 3.142), 48px);"'); ?>





        <?= qntm_acf_render($content, 'has-text-align-center', 'p'); ?>


    </div>
    <div class="wp-block-group alignwide is-layout-grid wp-container-core-group-is-layout-q11 wp-block-group-is-layout-grid grid-cols-[auto,1fr,1fr,50%]">



        <?php if ($boxes): ?>
            <?php foreach ($boxes as $box):
                $box_heading = $box['heading'];
                $box_content = $box['content'];
                $box_icon = $box['icon'];
            ?>
                <div class="wp-block-group is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-5 wp-block-group-is-layout-constrained is-style-section-1--21205181cbec1f4f2e58b1776ff7bb25" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">
                    <figure class="wp-block-image aligncenter size-full is-resized is-style-icon"><img decoding="async" src="http://powder-tailpress.loc/wp-content/themes/powder/assets/icons/icon-circle-bolt.svg" alt="Circle bolt icon" style="object-fit:cover;width:30px;height:30px"></figure>



                    <h2 class="wp-block-heading has-text-align-center has-x-small-font-size" style="text-transform:uppercase"><?= $box_heading; ?></h2>



                    <?= $box_content ? "<p class='has-text-align-center has-small-font-size'>" . $box_content . "</p>" : ''; ?>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>



        <div class="wp-block-group is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-6 wp-block-group-is-layout-constrained is-style-section-1--21205181cbec1f4f2e58b1776ff7bb25" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">
            <figure class="wp-block-image aligncenter size-full is-resized is-style-icon"><img decoding="async" src="http://powder-tailpress.loc/wp-content/themes/powder/assets/icons/icon-circle-bolt.svg" alt="Circle bolt icon" style="object-fit:cover;width:30px;height:30px"></figure>



            <h2 class="wp-block-heading has-text-align-center has-x-small-font-size" style="text-transform:uppercase">Feature Headline</h2>



            <p class="has-text-align-center has-small-font-size">Design beautiful WordPress websites with the stylish Powder theme.</p>
        </div>



        <div class="wp-block-group is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-7 wp-block-group-is-layout-constrained is-style-section-1--21205181cbec1f4f2e58b1776ff7bb25" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">
            <figure class="wp-block-image aligncenter size-full is-resized is-style-icon"><img decoding="async" src="http://powder-tailpress.loc/wp-content/themes/powder/assets/icons/icon-circle-bolt.svg" alt="Circle bolt icon" style="object-fit:cover;width:30px;height:30px"></figure>



            <h2 class="wp-block-heading has-text-align-center has-x-small-font-size" style="text-transform:uppercase">Feature Headline</h2>



            <p class="has-text-align-center has-small-font-size">Design beautiful WordPress websites with the stylish Powder theme.</p>
        </div>



        <div class="wp-block-group is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-8 wp-block-group-is-layout-constrained is-style-section-1--21205181cbec1f4f2e58b1776ff7bb25" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">
            <figure class="wp-block-image aligncenter size-full is-resized is-style-icon"><img decoding="async" src="http://powder-tailpress.loc/wp-content/themes/powder/assets/icons/icon-circle-bolt.svg" alt="Circle bolt icon" style="object-fit:cover;width:30px;height:30px"></figure>



            <h2 class="wp-block-heading has-text-align-center has-x-small-font-size" style="text-transform:uppercase">Feature Headline</h2>



            <p class="has-text-align-center has-small-font-size">Design beautiful WordPress websites with the stylish Powder theme.</p>
        </div>



        <div class="wp-block-group is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-9 wp-block-group-is-layout-constrained is-style-section-1--21205181cbec1f4f2e58b1776ff7bb25" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">
            <figure class="wp-block-image aligncenter size-full is-resized is-style-icon"><img decoding="async" src="http://powder-tailpress.loc/wp-content/themes/powder/assets/icons/icon-circle-bolt.svg" alt="Circle bolt icon" style="object-fit:cover;width:30px;height:30px"></figure>



            <h2 class="wp-block-heading has-text-align-center has-x-small-font-size" style="text-transform:uppercase">Feature Headline</h2>



            <p class="has-text-align-center has-small-font-size">Design beautiful WordPress websites with the stylish Powder theme.</p>
        </div>



        <div class="wp-block-group is-style-section-1 has-global-padding is-layout-constrained wp-container-core-group-is-layout-10 wp-block-group-is-layout-constrained is-style-section-1--21205181cbec1f4f2e58b1776ff7bb25" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40)">
            <figure class="wp-block-image aligncenter size-full is-resized is-style-icon"><img decoding="async" src="http://powder-tailpress.loc/wp-content/themes/powder/assets/icons/icon-circle-bolt.svg" alt="Circle bolt icon" style="object-fit:cover;width:30px;height:30px"></figure>



            <h2 class="wp-block-heading has-text-align-center has-x-small-font-size" style="text-transform:uppercase">Feature Headline</h2>



            <p class="has-text-align-center has-small-font-size">Design beautiful WordPress websites with the stylish Powder theme.</p>
        </div>
    </div>
</div>


<style>
    .wp-container-core-group-is-layout-q11 {
        grid-template-columns: repeat(auto-fill, minmax(min(300px, 100%), 1fr));
        container-type: inline-size;
        gap: var(--wp--preset--spacing--40);
    }
</style>