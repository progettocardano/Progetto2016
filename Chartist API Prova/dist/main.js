var options = {

  // Don't draw the line chart points
  showPoint: true,
  // Disable line smoothing
  lineSmooth: true,
  // X-Axis specific configuration
  axisX: {
    // We can disable the grid for this axis
    showGrid: true,
    // and also don't show the label
    showLabel: true,
	
	labelInterpolationFnc: function(value) {
      return value + ' paolino';
    }
  },
  // Y-Axis specific configuration
  axisY: {
    // Lets offset the chart a bit from the labels
    offset: 60,
    // The label interpolation function enables you to modify the values
    // used for the labels on each axis. Here we are converting the
    // values into million pound.
    labelInterpolationFnc: function(value) {
      return '$' + value + 'm';
    }
  }
};


/*
new Chartist.Bar('#chart2', {
    labels: [1, 2, 3, 4],
    series: [[100, 120, 180, 200],
				[120, 20, 10, 210],
				[140, 220, 80, 280],
				[10, 156, 210, 900],
				[10, 320, 140, 580],
				[190, 230, 180, 280],
				[130, 130, 680, 700],
				[900, 120, 130, 580],
				[500, 120, 40, 240]]
  },options);
*/
function generateColumns(column){	
	var columnArray = new Array();
	for(i = 0; i < column; i++){
		columnArray.push(i+1);
	}
	return columnArray;
}

var col = generateColumns(10);

new Chartist.Line('#chart2', {
    labels: col,
    series: randomNumber(2, col.length)
  },options);
  
function randomNumber(line, column){
	var myArray = new Array();
		for(i = 0; i < line; i++){
			myArray.push([]);
			for(j = 0; j < column; j++){
			myArray[i].push(Math.round(Math.random()*100));
		}
		}
		return myArray;
  }