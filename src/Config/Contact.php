<?php
namespace Be\App\Company\Config;

class Contact
{

    public string $mapType = 'baidu';
    public string $mapKeyBaidu = '';
    public string $mapKeyGoogle = '';
    public string $lng = '113';
    public string $lat = '34';
    public string $markerTitle = '公司名称';
    public string $markerAddress = '公司详细地址';

    public string $phone = '400-000-0000';
    public string $email = 'sales@domain.com';
    public string $description = '';

    public int $workingHours = 0;
    public string $workingHoursTitle = '工作时间';
    public string $workingHoursMonday = '周一';
    public string $workingHoursMondayRange = '9:00 - 18:00';
    public string $workingHoursTuesday = '周二';
    public string $workingHoursTuesdayRange = '9:00 - 18:00';
    public string $workingHoursWednesday = '周三';
    public string $workingHoursWednesdayRange = '9:00 - 18:00';
    public string $workingHoursThursday = '周四';
    public string $workingHoursThursdayRange = '9:00 - 18:00';
    public string $workingHoursFriday = '周五';
    public string $workingHoursFridayRange = '9:00 - 18:00';
    public string $workingHoursSaturday = '周六';
    public string $workingHoursSaturdayRange = '休息';
    public string $workingHoursSunday = '周日';
    public string $workingHoursSundayRange = '休息';

}
