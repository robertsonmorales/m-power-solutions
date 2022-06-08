var animations = {
    enabled: true,
    easing: 'easein',
    speed: 800,
    animateGradually: {
        enabled: true,
        // delay: 150
    },
    dynamicAnimation: {
       enabled: true,
       speed: 350
    }
};

var chartOptions = {
    type: 'line',
    stacked: false,
    markers: {
        size: 4,
    },
    animations: animations,
    toolbar: {
        show: false,
    },
};

var gridOptions = {
    show: true,
    borderColor: '#F0F0F0',
    strokeDashArray: 1,
    position: 'back',
    xaxis: {
        lines: {
            show: false
        }
    },   
    yaxis: {
        lines: {
            show: true
        }
    }
};

var strokeOptions = {
    width: 3,
    curve: 'smooth'
}

var fillOptions = {
    opacity: 1,
    type: 'gradient'
}

var fontStack = ['Gilroy', 'Roboto', 'Sans-serif'];

var axisStyles = {
    fontFamily: fontStack,
    fontWeight: 700,
    fontSize: "16px",
    color: '#2E3A59'
}

var options = {
    colors: ["#3366ff", "#39DE54"], // average grades, exams
    series: [],
    noData: {
        text: 'Loading...',
        align: 'center',
        verticalAlign: 'middle'
    },
    title: {
        text: 'Progress Score',
        style: axisStyles
    },
    chart: chartOptions,
    grid: gridOptions,
    stroke: strokeOptions,
    // fill: fillOptions,
    xaxis: {
        labels: {
            style: axisStyles
        }
    },
    yaxis: {
        show: false,
        // labels: {
        //     formatter: function (value) {
        //         return "$" + initials(value)
        //     },
        //     style: axisStyles
        // }
    },
    dataLabels: { 
        enabled: false
    },
    tooltip: {
        followCursor: true,
        shared: true,
        intersect: false,
        y: {
            formatter: function (y) {
                if (typeof y !== "undefined") {
                    return y + " Point";
                }
                
                return y;
            }
        },
        style: axisStyles
    },
    legend: {
        show: true,
        position: 'top',
        horizontalAlign: 'right',
        floating: true,
        offsetY: -40,
        offsetX: -5,
    }
};

var el = document.getElementById("revenue-chart");
var revenue_chart = new ApexCharts(el, options);
revenue_chart.render();

axios.get('api/dashboard')
.then((res) => {
    var avg = res.data.avg;
    var exams = res.data.exams;
    var months = res.data.months;

    revenue_chart.updateOptions({
        series: [{
            name: 'Average grade',
            data: avg, // import
        },{
            name: "Exams",
            data: exams // import
        }],
        xaxis: {
            categories: months, // import
            labels: {
                style: axisStyles,
            }
        }
    })
});