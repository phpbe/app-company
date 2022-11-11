<be-head>
    <style type="text/css">
        .contact-icon {
            width: 3rem;
            height: 3rem;
            text-align: center;
            line-height: 3rem;
            color: #fff;
            background-color: var(--major-color);
            border-radius: 50%;
        }

        .working-hours-items {
            border: var(--major-color-8) 2px solid;
            padding: 2rem;
        }

        .working-hours-item-line {
            border-top: var(--major-color-6) 1px dotted;
            margin: .6rem 1rem 0 1rem;
        }
    </style>
</be-head>

<be-page-content>
    <div class="be-row">
        <div class="be-col-24 be-lg-col-13 be-pb-200">
            <iframe src="<?php echo beUrl('Company.Contact.'.$this->configContact->mapType.'Map'); ?>" style="width:100%;height:100%;min-height:400px;" scrolling="no" frameborder="0"></iframe>
            <a href="<?php echo beUrl('Company.Contact.'.$this->configContact->mapType.'Map'); ?>" target="_blank">全屏查看地图</a>
        </div>
        <div class="be-col-0 be-lg-col-1"></div>
        <div class="be-col-24 be-lg-col-10">
            <?php echo $this->configContact->description; ?>

            <?php if ($this->configContact->phone !== '' || $this->configContact->email !== '') { ?>
            <div class="be-row be-mt-100">

                <?php if ($this->configContact->phone !== '') { ?>
                <div class="be-col-auto">
                    <div class="contact-icon">
                        <i class="bi-telephone-fill"></i>
                    </div>
                </div>
                <div class="be-col-auto">
                    <div class="be-lh-300 be-pl-50 be-pr-200"><?php echo $this->configContact->phone; ?></div>
                </div>
                <?php } ?>

                <?php if ( $this->configContact->email !== '') { ?>
                <div class="be-col-auto">
                    <div class="contact-icon">
                        <i class="bi-envelope-fill"></i>
                    </div>
                </div>
                <div class="be-col-auto">
                    <div class="be-lh-300 be-pl-50"><?php echo $this->configContact->email; ?></div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>


            <?php if ($this->configContact->workingHours === 1) { ?>
            <div class="working-hours-items be-mt-200">
                <div class="be-fs-120 be-fw-bold be-c-777"><?php echo $this->configContact->workingHoursTitle; ?></div>
                <div class="be-row be-mt-150">
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursMonday; ?></div></div>
                    <div class="be-col"><div class="working-hours-item-line"></div></div>
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursMondayRange; ?></div></div>
                </div>
                <div class="be-row be-mt-150">
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursTuesday; ?></div></div>
                    <div class="be-col"><div class="working-hours-item-line"></div></div>
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursTuesdayRange; ?></div></div>
                </div>
                <div class="be-row be-mt-150">
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursWednesday; ?></div></div>
                    <div class="be-col"><div class="working-hours-item-line"></div></div>
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursWednesdayRange; ?></div></div>
                </div>
                <div class="be-row be-mt-150">
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursThursday; ?></div></div>
                    <div class="be-col"><div class="working-hours-item-line"></div></div>
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursThursdayRange; ?></div></div>
                </div>
                <div class="be-row be-mt-150">
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursFriday; ?></div></div>
                    <div class="be-col"><div class="working-hours-item-line"></div></div>
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursFridayRange; ?></div></div>
                </div>
                <div class="be-row be-mt-150">
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursSaturday; ?></div></div>
                    <div class="be-col"><div class="working-hours-item-line"></div></div>
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursSaturdayRange; ?></div></div>
                </div>
                <div class="be-row be-mt-150">
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursSunday; ?></div></div>
                    <div class="be-col"><div class="working-hours-item-line"></div></div>
                    <div class="be-col-auto"><div class="be-c-777"><?php echo $this->configContact->workingHoursSundayRange; ?></div></div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</be-page-content>