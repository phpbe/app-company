<?php
namespace Be\App\Company\Config;

/**
 * @BeConfig("工作时间")
 */
class WorkingHours
{
    /**
     * @BeConfigItem("标题", driver = "FormItemInput")
     */
    public string $title = '工作时间';

    /**
     * @BeConfigItem("周一", driver = "FormItemInput")
     */
    public string $monday = '周一';

    /**
     * @BeConfigItem("周一工作时间", driver = "FormItemInput")
     */
    public string $mondayWorkHours = '10:00AM - 07:00PM';

    /**
     * @BeConfigItem("周二", driver = "FormItemInput")
     */
    public string $tuesday = '周二';

    /**
     * @BeConfigItem("周二工作时间", driver = "FormItemInput")
     */
    public string $tuesdayWorkHours = '10:00AM - 07:00PM';

    /**
     * @BeConfigItem("周三", driver = "FormItemInput")
     */
    public string $wednesday = '周三';

    /**
     * @BeConfigItem("周三工作时间", driver = "FormItemInput")
     */
    public string $wednesdayWorkHours = '10:00AM - 07:00PM';

    /**
     * @BeConfigItem("周四", driver = "FormItemInput")
     */
    public string $thursday = '周四';

    /**
     * @BeConfigItem("周四工作时间", driver = "FormItemInput")
     */
    public string $thursdayWorkHours = '10:00AM - 07:00PM';

    /**
     * @BeConfigItem("周五", driver = "FormItemInput")
     */
    public string $friday = '周五';

    /**
     * @BeConfigItem("周五工作时间", driver = "FormItemInput")
     */
    public string $fridayWorkHours = '10:00AM - 07:00PM';

    /**
     * @BeConfigItem("周六", driver = "FormItemInput")
     */
    public string $saturday = '周六';

    /**
     * @BeConfigItem("周六工作时间", driver = "FormItemInput")
     */
    public string $saturdayWorkHours = '10:00AM - 07:00PM';

    /**
     * @BeConfigItem("周日", driver = "FormItemInput")
     */
    public string $sunday = '周日';

    /**
     * @BeConfigItem("周日工作时间", driver = "FormItemInput")
     */
    public string $sundayWorkHours = 'Closed';

}
