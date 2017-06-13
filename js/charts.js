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
            //'#0000FF', '#FF69B4'
            '#4f5eff', '#f999ff'
        ],
        title: {
            text: ''
        },
        xAxis: {
            categories: keys
        },
        yAxis: {
            title: {
                text: 'Population Percent'
            }
        },
        series: [{
                name: 'Male',
                data: values['Male']
            }, {
                name: 'Female',
                data: values['Female']
            }]
    });
}

function highestEducationChart(keys, values) {
    var myChart = Highcharts.chart('highest-education-chart', {
        chart: {
            type: 'bar'
        },
        colors: [
            //'#0000FF', '#FF69B4'
            '#4f5eff', '#f999ff'
        ],
        title: {
            text: 'Highest Education Level Completed'
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
                data: values
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
        title: {
            text: 'Current Enrollment'
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
                data: values
            }]
    });

}