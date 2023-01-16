<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="about_section layout_padding2-top layout_padding-bottom">
    <div class="design-box">
        <img src="<?php echo URLROOT ?>img/design-2.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            Start Shopping Now
                        </h2>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum dolor sit amet, consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam, quis nostrud
                    </p>
                    <div>
                        <a href="">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img-box">
                    <img src="<?php echo URLROOT ?>img/ring-img.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end about section -->
<section class="price_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Our Products
            </h2>
        </div>
        <div class="price_container">
            <?php foreach($data['products'] as $product): ?>
            <div class="box">
                <div class="name">
                    <h6>
                        <?php echo $product['name'] ?>
                    </h6>
                </div>
                <div class="img-box">
                    <img src="<?php echo URLROOT . 'uploads/' . $product['image']?>" alt="braclet">
                </div>
                <div class="detail-box">
                    <h5>
                        <span><?php echo $product['price'] ?></span> $
                    </h5>
                    <a href="">
                        Buy Now
                    </a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>