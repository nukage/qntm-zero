<?php

/**
 * Block Name: Form
 *
 */

$id = isset($block) ? (empty($block['anchor']) ? wp_unique_id('form-') : $block['anchor']) : wp_unique_id('form-');



$headline = get_field('headline');
$content = get_field('content');
$left_panel = get_field('left_panel');

$left_headline = $left_panel['headline'];
$left_content = $left_panel['content'];
$left_email = get_field('email_link', 'option');
$left_phone = get_field('phone', 'option');
$left_office_hours = get_field('office_hours', 'option');
$left_address = get_field('address', 'option');

$right_panel = get_field('right_panel');
$right_headline = $right_panel['headline'];
$right_form = $right_panel['form_select']
?>

<section id="<?php echo $id; ?>" class="form-block qntm-block">

    <div class="container-2xl">
        <?php echo $headline  ? '<h2 class="form-block__headline">' . $headline . '</h2>' : ''; ?>
        <?php echo $content  ? '<div class="wysiwyg form-block__content ">' . $content . '</div>' : ''; ?>
        <div class="form-block__wrap">


            <div class="form-block__left-col">
                <?php echo $left_headline  ? '<h3 class="form-block__left-headline">' . preventWidows($left_headline) . '</h3>' : ''; ?>
                <?php echo $left_content  ? '<div class="form-block__left-content wysiwyg">' . $left_content . '</div>' : ''; ?>
                <div class="form-block__left-items">
                    <?php echo $left_email ? '<a class="form-block__left-email" href="mailto:' . $left_email . '"><img src="' . get_template_directory_uri() . '/resources/images/form_email.svg"><h5>Email</h5>'  . $left_email . '</a>' : ''; ?>
                    <?php echo $left_phone ? '<a class="form-block__left-phone" href="tel:' . $left_phone . '"><img src="' . get_template_directory_uri() . '/resources/images/form_phone.svg"><h5>Phone</h5>'  . $left_phone . '</a>' : ''; ?>
                    <?php echo $left_office_hours ? '<div class="form-block__left-office-hours"><img src="' . get_template_directory_uri() . '/resources/images/form_office.svg"><h5>Office Hours</h5>'  . $left_office_hours . '</div>' : ''; ?>
                    <?php echo $left_address ? '<div class="form-block__left-address"><img src="' . get_template_directory_uri() . '/resources/images/form_address.svg"><h5>Mailing Address</h5>' . $left_address . '</div>' : ''; ?>
                </div>
            </div>
            <div class="form-block__right-col">
                <?php echo $headline  ? '<h3 class="form-block__right-headline">' . $right_headline . '</h3>' : ''; ?>
                <?php echo $right_form ?   do_shortcode('[gravityform id="' . $right_form . '" title="false" description="false" ajax="true" tabindex="1000"]') : ''; ?>
            </div>
        </div>
    </div>
</section>