<script>

var colorSet = {
	red: 'rgba(255,99,132,1)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgba(75, 192, 192, 1)',
	grey: 'rgb(201, 203, 207)',
    black: 'rgb(0, 0, 0)'
};

var color = Chart.helpers.color;


var ctx = document.getElementById("graph-radar").getContext('2d');
ctx.canvas.width = 180;
var myChart = new Chart(ctx, {
    type: 'radar',
    data: {
        labels: ['思考力', '判断力', '表現力'],
        datasets: [{
			label: "今回の結果",
			backgroundColor: color(colorSet.red).alpha(0).rgbString(),
			borderColor: colorSet.red,
			pointBackgroundColor: colorSet.red,
			data: <?php echo $this_time_avg['data_label'] ?>
		},{
            label: "前回の結果",
			backgroundColor: color(colorSet.yellow).alpha(0).rgbString(),
			borderColor: colorSet.yellow,
			pointBackgroundColor: colorSet.yellow,
			data: <?php echo $last_time_avg['data_label'] ?>
        },{
            label: "全体の平均",
			backgroundColor: color(colorSet.green).alpha(0).rgbString(),
			borderColor: colorSet.green,
			pointBackgroundColor: colorSet.green,
			data: <?php echo $overall_avg['data_label'] ?>
        }]
    },
    options: {
        legend: {
            position: 'bottom'
        },
        scale: {
			display: true,
            // ラベルの設定
			pointLabels: {
				fontSize: 25,
				fontColor: colorSet.black
			},
            // 目盛りの設定
			ticks: {
				display: true,
				fontSize: 15,
				fontColor: colorSet.grey,
				min: 0,
				max: 10,
				beginAtZero: true
			},
            // チャートのラインの設定
			gridLines: {
				display: true,
				color: color(colorSet.grey).alpha(0.3).rgbString()
			},
            // レーダーチャートの余白の調整
            beforeFit: function (scale) {
                if (scale.chart.config.data.labels.length === 3) {
                    var pointLabelFontSize = Chart.helpers.getValueOrDefault(scale.options.pointLabels.fontSize, Chart.defaults.global.defaultFontSize);
                    scale.height *= (2 / 1.5)
                    scale.height -= pointLabelFontSize;
                }
            },
            afterFit: function (scale) {
                if (scale.chart.config.data.labels.length === 3) {
                    var pointLabelFontSize = Chart.helpers.getValueOrDefault(scale.options.pointLabels.fontSize, Chart.defaults.global.defaultFontSize);
                    scale.height += pointLabelFontSize;
                    scale.height /= (2 / 1.5);
                }
            }
		}
    }
});
</script>