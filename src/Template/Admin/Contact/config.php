
<be-page-content>
    <?php
    $formData = [];
    $uiItems = new \Be\AdminPlugin\UiItem\UiItems();
    $rootUrl = \Be\Be::getRequest()->getRootUrl();
    ?>

    <div id="app" v-cloak>
        <el-form ref="formRef" :model="formData" class="be-mb-200" size="medium">
            <div class="be-row">
                <div class="be-col-14">
                    <div class="be-p-150 be-bc-fff">

                        <div class="be-row">
                            <div class="be-col-auto be-lh-400">
                                <span class="be-c-red">*</span> 地图类型：
                            </div>
                            <div class="be-col be-pl-100">
                                <el-form-item class="be-mt-50" prop="mapType">
                                    <el-radio-group v-model="formData.mapType">
                                        <el-radio-button label="baidu">百度地图</el-radio-button>
                                        <el-radio-button label="google">谷歌地图</el-radio-button>
                                    </el-radio-group>
                                </el-form-item>
                            </div>
                        </div>
                        <?php $formData['mapType'] = $this->configContact->mapType; ?>

                        <template v-if="formData.mapType === 'baidu'">
                            <div class="be-mt-100"><span class="be-c-red">*</span> 百度地图Key：</div>
                            <el-form-item class="be-mt-50" prop="mapKeyBaidu">
                                <el-input
                                        type="text"
                                        placeholder="请输入百度地图Key"
                                        v-model="formData.mapKeyBaidu"
                                        maxlength="100"
                                        show-word-limit>
                                </el-input>
                            </el-form-item>
                            <?php $formData['mapKeyBaidu'] = $this->configContact->mapKeyBaidu; ?>

                            <div class="be-mt-100"><span class="be-c-red">*</span> 在地图中标记位置：</div>
                            <div class="be-mt-50">
                                <iframe src="<?php echo beAdminUrl('Company.Contact.baiduMap'); ?>" style="width:100%; height:400px;" scrolling="no" frameborder="0"></iframe>
                            </div>
                        </template>

                        <template v-if="formData.mapType === 'google'">
                            <div class="be-mt-100"><span class="be-c-red">*</span> Google地图Key：</div>
                            <el-form-item class="be-mt-50" prop="mapKeyGoogle">
                                <el-input
                                        type="text"
                                        placeholder="请输入Google地图Key"
                                        v-model="formData.mapKeyGoogle"
                                        maxlength="100"
                                        show-word-limit>
                                </el-input>
                            </el-form-item>
                            <?php $formData['mapKeyGoogle'] = $this->configContact->mapKeyGoogle; ?>

                            <div class="be-mt-100"><span class="be-c-red">*</span> 在地图中标记位置：</div>
                            <div class="be-mt-50">
                                <iframe src="<?php echo beAdminUrl('Company.Contact.googleMap'); ?>" style="width:100%; height:400px;" scrolling="no" frameborder="0"></iframe>
                            </div>

                        </template>

                        <div class="be-row be-lh-300">
                            <div class="be-col-auto">
                                选中的经纬度：
                            </div>
                            <div class="be-col be-pl-100">
                                经度：{{formData.lng}}
                            </div>
                            <div class="be-col be-pl-100">
                                纬度：{{formData.lat}}
                            </div>
                        </div>
                        <?php $formData['lng'] = $this->configContact->lng; ?>
                        <?php $formData['lat'] = $this->configContact->lat; ?>

                        <div class="be-mt-100"><span class="be-c-red">*</span> 定位点标题：</div>
                        <el-form-item class="be-mt-50" prop="address">
                            <el-input
                                    type="text"
                                    placeholder="请输入定位点标题"
                                    v-model="formData.markerTitle"
                                    maxlength="300"
                                    show-word-limit>
                            </el-input>
                        </el-form-item>
                        <?php $formData['markerTitle'] = $this->configContact->markerTitle; ?>

                        <div class="be-mt-100"><span class="be-c-red">*</span> 定位点地址：</div>
                        <el-form-item class="be-mt-50" prop="address">
                            <el-input
                                    type="text"
                                    placeholder="请输入定位点地址"
                                    v-model="formData.markerAddress"
                                    maxlength="300"
                                    show-word-limit>
                            </el-input>
                        </el-form-item>
                        <?php $formData['markerAddress'] = $this->configContact->markerAddress; ?>


                        <div class="be-mt-100">描述：</div>
                        <?php
                        $driver = new \Be\AdminPlugin\Form\Item\FormItemTinymce([
                            'name' => 'description',
                            'ui' => [
                                'form-item' => [
                                    'class' => 'be-mt-50'
                                ],
                            ],
                        ]);
                        echo $driver->getHtml();

                        $formData['description'] = $this->configContact->description;

                        $uiItems->add($driver);
                        ?>

                    </div>
                </div>
                <div class="be-col-10">

                    <div class="be-pl-200">

                        <div class="be-p-150 be-bc-fff">

                            <div class="">电话：</div>
                            <el-form-item class="be-mt-50" prop="phone">
                                <el-input
                                        type="text"
                                        placeholder="请输入联系电话"
                                        v-model="formData.phone"
                                        maxlength="30">
                                </el-input>
                            </el-form-item>
                            <?php $formData['phone'] = $this->configContact->phone; ?>

                            <div class="be-mt-100">邮箱：</div>
                            <el-form-item class="be-mt-50" prop="email">
                                <el-input
                                        type="text"
                                        placeholder="请输入联系邮箱"
                                        v-model="formData.email"
                                        maxlength="30">
                                </el-input>
                            </el-form-item>
                            <?php $formData['email'] = $this->configContact->email; ?>

                            <div class="be-mt-100">工作时间：</div>
                            <el-form-item class="be-mt-50" prop="workingHours">
                                <el-switch v-model.number="formData.workingHours" :active-value="1" :inactive-value="0"></el-switch>
                            </el-form-item>
                            <?php $formData['workingHours'] = $this->configContact->workingHours; ?>

                            <template v-if="formData.workingHours === 1">

                                <div class="be-row">
                                    <div class="be-col-auto be-lh-250">
                                        标题：
                                    </div>
                                    <div class="be-col-auto be-pl-100">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="标题"
                                                v-model="formData.workingHoursTitle">
                                        </el-input>
                                        <?php $formData['workingHoursTitle'] = $this->configContact->workingHoursTitle; ?>
                                    </div>
                                </div>

                                <div class="be-row be-mt-50">
                                    <div class="be-col-auto">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="周一"
                                                v-model="formData.workingHoursMonday">
                                        </el-input>
                                        <?php $formData['workingHoursMonday'] = $this->configContact->workingHoursMonday; ?>
                                    </div>
                                    <div class="be-col-auto be-pl-100">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="时间范围"
                                                v-model="formData.workingHoursMondayRange">
                                        </el-input>
                                        <?php $formData['workingHoursMondayRange'] = $this->configContact->workingHoursMondayRange; ?>
                                    </div>
                                </div>

                                <div class="be-row be-mt-50">
                                    <div class="be-col-auto">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="周二"
                                                v-model="formData.workingHoursTuesday">
                                        </el-input>
                                        <?php $formData['workingHoursTuesday'] = $this->configContact->workingHoursTuesday; ?>
                                    </div>
                                    <div class="be-col-auto be-pl-100">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="时间范围"
                                                v-model="formData.workingHoursTuesdayRange">
                                        </el-input>
                                        <?php $formData['workingHoursTuesdayRange'] = $this->configContact->workingHoursTuesdayRange; ?>
                                    </div>
                                </div>

                                <div class="be-row be-mt-50">
                                    <div class="be-col-auto">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="周三"
                                                v-model="formData.workingHoursWednesday">
                                        </el-input>
                                        <?php $formData['workingHoursWednesday'] = $this->configContact->workingHoursWednesday; ?>
                                    </div>
                                    <div class="be-col-auto be-pl-100">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="时间范围"
                                                v-model="formData.workingHoursWednesdayRange">
                                        </el-input>
                                        <?php $formData['workingHoursWednesdayRange'] = $this->configContact->workingHoursWednesdayRange; ?>
                                    </div>
                                </div>


                                <div class="be-row be-mt-50">
                                    <div class="be-col-auto">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="周四"
                                                v-model="formData.workingHoursThursday">
                                        </el-input>
                                        <?php $formData['workingHoursThursday'] = $this->configContact->workingHoursThursday; ?>
                                    </div>
                                    <div class="be-col-auto be-pl-100">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="时间范围"
                                                v-model="formData.workingHoursThursdayRange">
                                        </el-input>
                                        <?php $formData['workingHoursThursdayRange'] = $this->configContact->workingHoursThursdayRange; ?>
                                    </div>
                                </div>

                                <div class="be-row be-mt-50">
                                    <div class="be-col-auto">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="周五"
                                                v-model="formData.workingHoursFriday">
                                        </el-input>
                                        <?php $formData['workingHoursFriday'] = $this->configContact->workingHoursFriday; ?>
                                    </div>
                                    <div class="be-col-auto be-pl-100">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="时间范围"
                                                v-model="formData.workingHoursFridayRange">
                                        </el-input>
                                        <?php $formData['workingHoursFridayRange'] = $this->configContact->workingHoursFridayRange; ?>
                                    </div>
                                </div>

                                <div class="be-row be-mt-50">
                                    <div class="be-col-auto">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="周六"
                                                v-model="formData.workingHoursSaturday">
                                        </el-input>
                                        <?php $formData['workingHoursSaturday'] = $this->configContact->workingHoursSaturday; ?>
                                    </div>
                                    <div class="be-col-auto be-pl-100">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="时间范围"
                                                v-model="formData.workingHoursSaturdayRange">
                                        </el-input>
                                        <?php $formData['workingHoursSaturdayRange'] = $this->configContact->workingHoursSaturdayRange; ?>
                                    </div>
                                </div>

                                <div class="be-row be-mt-50">
                                    <div class="be-col-auto">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="周日"
                                                v-model="formData.workingHoursSunday">
                                        </el-input>
                                        <?php $formData['workingHoursSunday'] = $this->configContact->workingHoursSunday; ?>
                                    </div>
                                    <div class="be-col-auto be-pl-100">
                                        <el-input
                                                type="text"
                                                size="medium"
                                                placeholder="时间范围"
                                                v-model="formData.workingHoursSundayRange">
                                        </el-input>
                                        <?php $formData['workingHoursSundayRange'] = $this->configContact->workingHoursSundayRange; ?>
                                    </div>
                                </div>

                            </template>

                        </div>

                        <div class="be-mt-200 be-ta-right">
                            <el-button type="primary" :disabled="loading" @click="save">保存</el-button>
                        </div>
                    </div>

                </div>
            </div>

        </el-form>

    </div>

    <?php
    echo $uiItems->getJs();
    echo $uiItems->getCss();
    ?>

    <script>
        let vueForm = new Vue({
            el: '#app',
            data: {
                formData: <?php echo json_encode($formData); ?>,
                loading: false,

                t: false
                <?php
                echo $uiItems->getVueData();
                ?>
            },
            methods: {
                save: function () {
                    let _this = this;
                    this.$refs["formRef"].validate(function (valid) {
                        if (valid) {
                            _this.loading = true;
                            vueNorth.loading = true;
                            _this.$http.post("<?php echo beAdminUrl('Company.Contact.config'); ?>", {
                                formData: _this.formData
                            }).then(function (response) {
                                _this.loading = false;
                                vueNorth.loading = false;
                                //console.log(response);
                                if (response.status === 200) {
                                    var responseData = response.data;
                                    if (responseData.success) {
                                        _this.$message.success(responseData.message);
                                        setTimeout(function () {
                                            window.location.reload();
                                        }, 1000);
                                    } else {
                                        if (responseData.message) {
                                            _this.$message.error(responseData.message);
                                        } else {
                                            _this.$message.error("服务器返回数据异常！");
                                        }
                                    }
                                }
                            }).catch(function (error) {
                                _this.loading = false;
                                vueNorth.loading = false;
                                _this.$message.error(error);
                            });
                        } else {
                            return false;
                        }
                    });
                },
                setLngLat(lng, lat) {
                    this.formData.lng = lng;
                    this.formData.lat = lat;
                }

                <?php
                echo $uiItems->getVueMethods();
                ?>
            }

            <?php
            //$uiItems->setVueHook('mounted', 'window.onbeforeunload = function(e) {e = e || window.event; if (e) { e.returnValue = ""; } return ""; };');
            echo $uiItems->getVueHooks();
            ?>
        });

        function setLngLat(lng, lat) {
            vueForm.setLngLat(lng, lat);
        }

    </script>
</be-page-content>