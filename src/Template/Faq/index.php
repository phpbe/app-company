<be-page-content>
    <div class="be-row">
        <div class="be-col-24 be-md-col-13">
            <iframe src="<?php echo beUrl('Company.Contact.'.$this->configContact->mapType.'Map'); ?>" style="width:100%;height:400px;" scrolling="no" frameborder="0"></iframe>
            <a href="<?php echo beUrl('Company.Contact.'.$this->configContact->mapType.'Map'); ?>" target="_blank">全屏查看地图</a>
        </div>
        <div class="be-col-0 be-md-col-1"></div>
        <div class="be-col-24 be-md-col-10">
            <?php echo $this->configContact->info; ?>
        </div>
    </div>
</be-page-content>