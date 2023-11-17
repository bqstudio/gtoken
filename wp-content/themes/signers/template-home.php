<?php /* Template Name: Template-Home */ ?>
<?php get_header(); ?>

<?php
$form_id = get_field('form_id');
?>

<!-- Hero Home -->
<section class="wrapper wrapper--grey">
    <section class="hero hero--home">
        <div class="container">
            <div class="content">
                <div class="hero__text">
                    <h1 class="title">Property, casualty & personal insurance</h1>
                    <h3 class="uppertitle">with a niche focus on the transportation industry</h3>
                    <p>For your ongoing insurance needs, whether personal or commercial, we understand every detail matters.  At Principle, we're not just offering insurance.  We're delivering peace of mind, tailored to you.</p>
                </div>
                <div class="hero__image">
                    <div class="image-background">
                        <img src="<?php echo get_template_directory_uri();?>/images/examples/hero-home.jpg">
                    </div>
                </div>
            </div>
        </div>  
    </section>
</section>

<!-- facts -->
<section class="wrapper wrapper--white">
    <section class="facts">
        <div class="container">
            <div class="content">
                <div class="content__text">
                    <h4 class="subtitle">Company facts</h4>
                    <h2 class="title">Proud of our work</h2>
                </div>
                <div class="content__items">
                    <div class="top">
                        <div class="item">
                            <div class="item__icon">
                                <img src="<?php echo get_template_directory_uri();?>/images/icons/clients-icon.svg">
                            </div>
                            <div class="item__data">
                                <div class="item__number">1700</div>
                                <h5 class="item__name">Clients served</h5>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item__icon">
                                <img src="<?php echo get_template_directory_uri();?>/images/icons/policies-icon.svg">
                            </div>
                            <div class="item__data">
                                <div class="item__number">2800</div>
                                <h5 class="item__name">Policies in-force</h5>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <h6 class="facts-inline">Humility</h6>
                        <h6 class="facts-inline">Work Ethic</h6>
                        <h6 class="facts-inline">Caring</h6>
                        <h6 class="facts-inline">Effectivity</h6>
                        <h6 class="facts-inline">Passion</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Roadmap -->
<section class="wrapper wrapper--white">
    <section class="roadmap">
        <div class="container">
            <div class="content">
                <div class="roadmap__image">
                    <div class="image-background">
                        <img src="<?php echo get_template_directory_uri();?>/images/examples/our-roadmap.jpg">
                    </div>
                </div>
                <div class="roadmap__text">
                    <h2 class="title">Our roadmap</h2>
                    <h4 class="description">Founded in 2020, Principle began as  a brokerage focused on a broad-base of both personal and commercial insurance needs.  As we have evolved, we've added expertise on a number of transportation-related insurance needs.</h4>
                    <p class="paragraph">With access to dozens of specialized carriers, Principle offers homeowners coverage, as well as commercial property & casualty coverage to meet all your needs.</p>
                    <p class="paragraph">With a specialized practice in transportation, Principle offers expertise in the ever-changing needs of this market.   Focused programs around School Bus coverage, Auto and Motorcycle rental coverage, and Chauffered Vehicle / Limo coverage help ensure we deliver the best available options to this niche market.</p>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Text Image -->
<section class="wrapper wrapper--grey">
    <section class="text-image">
        <div class="container">
            <div class="content">
                <div class="content__text">
                    <h4 class="title">Today, Principle proudly holds an impressive array of strategic assets in the dynamic landscape of the insurance market.</h4>
                    <ul class="list-text">
                        <li>Base of employees in Charlotte, North Carolina featuring skilled service professionals.</li>
                        <li>Experienced service professionals for personal and commercial lines.</li>
                        <li>Broad panel of carriers and clients that can be efficiently serviced as part of a consolidated business.</li>
                    </ul>
                </div>
                <div class="content__image">
                    <div class="image-background">
                        <img src="<?php echo get_template_directory_uri();?>/images/examples/image.jpg">
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Partners -->
<section class="wrapper wrapper--white">
    <section class="partners">
        <div class="container">
            <h3 class="title">Selected carrier partners</h3>
            <div class="swiper slider-partners">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide item">
                            <img src="<?php echo get_template_directory_uri();?>/images/icons/allstate-logo.svg">
                        </div>
                        <div class="swiper-slide item">
                            <img src="<?php echo get_template_directory_uri();?>/images/icons/appalachian-logo.svg">
                        </div>
                        <div class="swiper-slide item">
                            <img src="<?php echo get_template_directory_uri();?>/images/icons/auto-owners-logo.svg">
                        </div>
                        <div class="swiper-slide item">
                            <img src="<?php echo get_template_directory_uri();?>/images/icons/crurch-mutual-logo.svg">
                        </div>
                        <div class="swiper-slide item">
                            <img src="<?php echo get_template_directory_uri();?>/images/icons/foremost-logo.svg">
                        </div>
                        <div class="swiper-slide item">
                            <img src="<?php echo get_template_directory_uri();?>/images/icons/the-hartford-logo.svg">
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
        </div>
    </section>
</section>


<section class="wrapper wrapper--light-blue">
    <section class="contact-form">
        <div class="container">
            <h2 class="title">Interested? Learn More About us.</h2>
            <div class="formcontainer">
                <?php echo apply_shortcodes('[gravityform id="'.$form_id.'" title="false" description="false" ajax="true"]'); ?>
            </div>
        </div>
    </section>
</section>




<?php get_footer(); 
