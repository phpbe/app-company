<be-page-content>
    <div class="be-row">
        <div class="be-col-24 be-md-col-13">
            <iframe src="<?php echo beUrl('Company.Contact.'.$this->configContact->mapType.'Map'); ?>" style="width:100%;height:400px;" scrolling="no" frameborder="0"></iframe>
            <a href="<?php echo beUrl('Company.Contact.'.$this->configContact->mapType.'Map'); ?>" target="_blank">全屏查看地图</a>
        </div>
        <div class="be-col-0 be-md-col-1"></div>
        <div class="be-col-24 be-md-col-10">
            <?php echo $this->configContact->description; ?>

            public string $phone = '400-000-0000';
            public string $email = 'sales@domain.com';

            <?php if ($this->configContact->phone !== '' || $this->configContact->email !== '') { ?>
            <div class="be-row be-mt-100">

                <?php if ($this->configContact->phone !== '') { ?>
                <div class="be-col-auto">
                    <i class="bi-phone"></i>
                </div>
                <div class="be-col-auto">
                    <span class="be-pl-100 be-pr-100"><?php echo $this->configContact->phone; ?></span>
                </div>
                <?php } ?>

                <?php if ( $this->configContact->email !== '') { ?>
                <div class="be-col-auto">
                    <i class="bi-mail"></i>
                </div>
                <div class="be-col-auto">
                    <?php echo $this->configContact->email; ?>
                </div>
                <?php } ?>
            </div>
            <?php } ?>

        </div>
    </div>
</be-page-content>