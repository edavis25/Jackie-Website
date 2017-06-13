function ageChart(keys, values) {
    // Divide each value in array by 2
    for (var i = 0; i < values['Male'].length; i++) {
        values['Male'][i] /= 2;
    }
    for (var i = 0; i < values['Female'].length; i++) {
        values['Female'][i] /= 2;
    }
    
    var myChart = Highcharts.chart('age-chart', {
        chart: {
            type: 'column'
        },
        colors: [
            '#4f5eff', '#f999ff'
        ],
        credits: {
            enabled: false
        },
        title: {
            text: ''
        },
        tooltip: {
            headerFormat: '{series.name}s  aged {point.key}<br>',
            pointFormat: '<b>{point.y:.1f}%</b>'
        },
        xAxis: {
            categories: keys.reverse()
        },
        yAxis: {
            title: {
                text: 'Population Percent'
            },
            labels: {
                format: '{value}%'
            }
        },
        series: [{
                name: 'Male',
                data: values['Male'].reverse()
            }, {
                name: 'Female',
                data: values['Female'].reverse()
            }]
    });
}

function highestEducationChart(keys, values) {
    var myChart = Highcharts.chart('highest-education-chart', {
        chart: {
            type: 'bar'
        },
        colors: [
            '#4f5eff', '#f999ff'
        ],
        credits: {
            enabled: false
        },
        title: {
            text: 'Highest Education Level Completed'
        },
        tooltip: {
            pointFormat: '{point.y:.1f}%'
        },
        xAxis: {
            categories: keys
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
                name: 'Highest Level Completed',
                data: values,
                dataLabels: {
                    enabled: true,
                    format: '{y:.1f}%'
                }
            }]
    });

}

function currentEnrollmentChart(keys, values) {
    var myChart = Highcharts.chart('current-enrollment-chart', {
        chart: {
            type: 'bar'
        },
        colors: [
            '#4f5eff', '#f999ff'
        ],
        credits: {
            enabled: false
        },
        title: {
            text: 'Current Enrollment'
        },
        tooltip: {
            pointFormat: '{point.y:.1f}%'
        },
        xAxis: {
            categories: keys
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
                name: 'Current Enrollment',
                data: values,
                dataLabels: {
                    enabled: true,
                    format: '{y:.1f}%'
                }
            }]
    });
}

function annualIncomeChart(keys, values) {
    var myChart = Highcharts.chart('annual-income-chart', {
        chart: {
            type: 'bar'
        },
        colors: [
            '#4f5eff', '#f999ff'
        ],
        credits: {
            enabled: false
        },
        title: {
            text: 'Annual Household Income'
        },
        tooltip: {
            pointFormat: '{point.y:.1f}%'
        },
        xAxis: {
            categories: keys
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
                name: 'Annual Income',
                data: values,
                dataLabels: {
                    enabled: true,
                    format: '{y:.1f}%'
                }
            }]
    });
}

function commuteChart(keys, values) {
    var myChart = Highcharts.chart('commute-chart', {
        chart: {
            type: 'bar'
        },
        colors: [
            '#4f5eff', '#f999ff'
        ],
        title: {
            text: 'Daily Commute'
        },
        tooltip: {
            pointFormat: '{point.y:.1f}%'
        },
        xAxis: {
            categories: keys
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
                name: 'Commute Time',
                data: values,
                dataLabels: {
                    enabled: true,
                    format: '{y:.1f}%'
                }
            }]
    });
}

function employmentTypeChart(keys, values) {
    var myChart = Highcharts.chart('employment-type-chart', {
        chart: {
            type: 'bar'
        },
        colors: [
            '#4f5eff', '#f999ff'
        ],
        credits: {
            enabled: false
        },
        title: {
            text: 'Type of Employment'
        },
        tooltip: {
            pointFormat: '{point.y:.1f}%'
        },
        xAxis: {
            categories: keys
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
                name: 'Commute Time',
                data: values,
                dataLabels: {
                    enabled: true,
                    format: '{y:.1f}%'
                }
            }]
    });
}

function commuteChart(keys, values) {
    var myChart = Highcharts.chart('commute-chart', {
        chart: {
            type: 'bar'
        },
        colors: [
            '#4f5eff', '#f999ff'
        ],
        title: {
            text: 'Daily Commute'
        },
        tooltip: {
            pointFormat: '{point.y:.1f}%'
        },
        xAxis: {
            categories: keys
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
                name: 'Commute Time',
                data: values,
                dataLabels: {
                    enabled: true,
                    format: '{y:.1f}%'
                }
            }]
    });
}

function employmentTypeChart(keys, values) {
    var myChart = Highcharts.chart('employment-type-chart', {
        chart: {
            type: 'bar'
        },
        colors: [
            '#4f5eff', '#f999ff'
        ],
        title: {
            text: 'Type of Employment'
        },
        tooltip: {
            pointFormat: '{point.y:.1f}%'
        },
        xAxis: {
            categories: keys
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
                name: 'Commute Time',
                data: values,
                dataLabels: {
                    enabled: true,
                    format: '{y:.1f}%'
                }
            }]
    });
}

function commuteChart(keys, values) {
    var myChart = Highcharts.chart('commute-chart', {
        chart: {
            type: 'bar'
        },
        colors: [
            '#4f5eff', '#f999ff'
        ],
        credits: {
            enabled: false
        },
        title: {
            text: 'Daily Commute'
        },
        tooltip: {
            pointFormat: '{point.y:.1f}%'
        },
        xAxis: {
            categories: keys
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
                name: 'Commute Time',
                data: values,
                dataLabels: {
                    enabled: true,
                    format: '{y:.1f}%'
                }
            }]
    });
}

function collarTypeChart(keys, values) {   
    var myChart = Highcharts.chart('collar-type-chart', {
        chart: {
            type: 'pie'
        },
        colors: [
            '#4f5eff', '#a5a5a5'
        ],
        credits: {
            enabled: false
        },
        title: {
            text: ''
        },
        tooltip: {
            pointFormat: '{point.percentage:.1f}%'
        },
        series: [{
                data: [{
                        name: keys[0],
                        y: values[0]
                    }, {
                        name: keys[1],
                        y: values[1]
                    }]
            }]
    });
}