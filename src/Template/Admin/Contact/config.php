


<be-page-content>
    <?php
    $js = [];
    $css = [];
    $formData = [];
    $vueData = [];
    $vueMethods = [];
    $vueHooks = [];

    $rootUrl = \Be\Be::getRequest()->getRootUrl();
    ?>

    <div id="app" v-cloak>
        <el-form ref="formRef" :model="formData" class="be-mb-200">
            <div class="be-row">
                <div class="be-col-14">
                    <div class="be-p-150 be-bc-fff">

                        <div><span class="be-c-red">*</span> 页面标题：</div>
                        <el-form-item class="be-mt-50" prop="title" :rules="[{required: true, message: '请输入页面标题', trigger: 'change' }]">
                            <el-input
                                    type="text"
                                    placeholder="请输入页面标题"
                                    v-model = "formData.title"
                                    size="medium"
                                    maxlength="120"
                                    show-word-limit>
                            </el-input>
                        </el-form-item>
                        <?php $formData['title'] = $this->configContact->title; ?>

                        <div class="be-row">
                            <div class="be-col-auto be-lh-400">
                                <span class="be-c-red">*</span> 地图类型：
                            </div>
                            <div class="be-col be-pl-100">
                                <el-form-item class="be-mt-50" prop="mapType">
                                    <el-radio-group  size="medium" v-model="formData.mapType">
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
                                        size="medium"
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
                                        size="medium"
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
                                    size="medium"
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
                                    size="medium"
                                    show-word-limit>
                            </el-input>
                        </el-form-item>
                        <?php $formData['markerAddress'] = $this->configContact->markerAddress; ?>
                    </div>
                </div>
                <div class="be-col-10">

                    <div class="be-pl-200">

                        <div class="be-p-150 be-bc-fff">

                            <div>
                                SEO描述
                                <el-tooltip effect="dark" content="这是该文章分类的整体SEO描述，可以添加一些文章分类描述，使文章分类在搜索引擎中获得更高的排名。" placement="top">
                                    <i class="el-icon-fa fa-question-circle-o"></i>
                                </el-tooltip>
                            </div>
                            <el-input
                                    class="be-mt-50"
                                    type="textarea"
                                    :rows="6"
                                    placeholder="请输入SEO描述"
                                    v-model = "formData.metaDescription"
                                    size="medium"
                                    maxlength="500"
                                    show-word-limit>
                            </el-input>
                            <?php
                            $formData['metaDescription'] = $this->configContact->metaDescription;
                            ?>

                            <div class="be-mt-150">
                                SEO关键词
                                <el-tooltip effect="dark" content="关键词可以提高搜索结果排名，建议1-2个关键词即可，堆砌关键词可能会降低排名！" placement="top">
                                    <i class="el-icon-fa fa-question-circle-o"></i>
                                </el-tooltip>
                            </div>
                            <el-input
                                    class="be-mt-50"
                                    type="text"
                                    placeholder="请输入SEO关键词，多个关键词以逗号分隔。"
                                    v-model = "formData.metaKeywords"
                                    size="medium"
                                    maxlength="60">
                            </el-input>
                            <?php
                            $formData['metaKeywords'] = $this->configContact->metaKeywords;
                            ?>

                            <div class="be-mt-150">描述：</div>
                            <?php
                            $driver = new \Be\AdminPlugin\Form\Item\FormItemTinymce([
                                'name' => 'info',
                                'ui' => [
                                    'form-item' => [
                                        'class' => 'be-mt-50'
                                    ],
                                ],
                            ]);
                            echo $driver->getHtml();

                            $formData['info'] = $this->configContact->info;

                            $jsX = $driver->getJs();
                            if ($jsX) {
                                $js = array_merge($js, $jsX);
                            }

                            $cssX = $driver->getCss();
                            if ($cssX) {
                                $css = array_merge($css, $cssX);
                            }

                            $vueDataX = $driver->getVueData();
                            if ($vueDataX) {
                                $vueData = \Be\Util\Arr::merge($vueData, $vueDataX);
                            }

                            $vueMethodsX = $driver->getVueMethods();
                            if ($vueMethodsX) {
                                $vueMethods = array_merge($vueMethods, $vueMethodsX);
                            }

                            $vueHooksX = $driver->getVueHooks();
                            if ($vueHooksX) {
                                foreach ($vueHooksX as $k => $v) {
                                    if (isset($vueHooks[$k])) {
                                        $vueHooks[$k] .= "\r\n" . $v;
                                    } else {
                                        $vueHooks[$k] = $v;
                                    }
                                }
                            }
                            ?>
                        </div>

                        <div class="be-mt-200 be-ta-right">
                            <el-button size="medium" type="primary" :disabled="loading" @click="save">保存</el-button>
                        </div>
                    </div>

                </div>
            </div>

        </el-form>

    </div>
    <?php
    if (count($js) > 0) {
        $js = array_unique($js);
        foreach ($js as $x) {
            echo '<script src="' . $x . '"></script>';
        }
    }

    if (count($css) > 0) {
        $css = array_unique($css);
        foreach ($css as $x) {
            echo '<link rel="stylesheet" type="text/css" href="' . $x . '" />';
        }
    }
    ?>

    <script>
        let vueCenter = new Vue({
            el: '#app',
            data: {
                formData: <?php echo json_encode($formData); ?>,
                loading: false,

                t: false
                <?php
                if ($vueData) {
                    foreach ($vueData as $k => $v) {
                        echo ',' . $k . ':' . json_encode($v);
                    }
                }
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
                if ($vueMethods) {
                    foreach ($vueMethods as $k => $v) {
                        echo ',' . $k . ':' . $v;
                    }
                }
                ?>
            },
            created: function () {
                <?php
                if (isset($vueHooks['created'])) {
                    echo $vueHooks['created'];
                }
                ?>
            },
            mounted: function () {
                <?php
                if (isset($vueHooks['mounted'])) {
                    echo $vueHooks['mounted'];
                }
                ?>
            },
            updated: function () {
                <?php
                if (isset($vueHooks['updated'])) {
                    echo $vueHooks['updated'];
                }
                ?>
            }
            <?php
            if (isset($vueHooks['beforeCreate'])) {
                echo ',beforeCreate: function () {' . $vueHooks['beforeCreate'] . '}';
            }

            if (isset($vueHooks['beforeMount'])) {
                echo ',beforeMount: function () {' . $vueHooks['beforeMount'] . '}';
            }

            if (isset($vueHooks['beforeUpdate'])) {
                echo ',beforeUpdate: function () {' . $vueHooks['beforeUpdate'] . '}';
            }

            if (isset($vueHooks['beforeDestroy'])) {
                echo ',beforeDestroy: function () {' . $vueHooks['beforeDestroy'] . '}';
            }

            if (isset($vueHooks['destroyed'])) {
                echo ',destroyed: function () {' . $vueHooks['destroyed'] . '}';
            }
            ?>
        });

        function setLngLat(lng, lat) {
            vueCenter.setLngLat(lng, lat);
        }

    </script>

</be-page-content>