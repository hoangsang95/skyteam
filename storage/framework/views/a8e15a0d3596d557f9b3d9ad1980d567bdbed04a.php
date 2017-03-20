<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="/" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Liên hệ</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Liên hệ với chúng tôi</span>
        </h2>
        <!-- ../page heading-->
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-subheading">Liên Hệ</h3>
                    
                    <form method="post" action="<?php echo e(url('lien-he')); ?>">
                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="contact-form-box">
                        <div class="form-selector">
                            <label>Chủ đề</label>
                                <input type="text" name="title" class="form-control input-sm" id="title">
                        </div>
                        <div class="form-selector">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control input-sm" id="email">
                        </div>
                        <div class="form-selector">
                            <label>Số điện thoai</label>
                            <input type="number" name="phone" class="form-control input-sm" id="phone">
                        </div>
                        <div class="form-selector">
                            <label>Lời nhắn</label>
                            <textarea class="form-control input-sm" name="mess" rows="10" id="message"></textarea>
                        </div>
                        <div class="form-selector">
                            <button type="submit" id="btn-send-contact" class="btn">Gửi</button>
                        </div>
                    </div>
                        
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6" id="contact_form_map">
                    <h3 class="page-subheading">Thông tin liên hệ</h3>
                    <br>
                    <ul class="store_info">
                        <li><i class="fa fa-home"></i>Our business address is 1063 Freelon Street San Francisco, CA 95108</li>
                        <li><i class="fa fa-phone"></i><span>+ 021.343.7575</span></li>
                        <li><i class="fa fa-phone"></i><span>+ 020.566.6666</span></li>
                        <li><i class="fa fa-envelope"></i>Email: <span><a href="">support@kutetheme.com</a></span></li>
                    </ul> 
                    <h3 class="page-subheading">Bản đồ</h3>
                    <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/d/embed?mid=1Xb8aRDr70jrZkUuWsGnbbZ3WmP4" width="640" height="480" frameborder="0" ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
