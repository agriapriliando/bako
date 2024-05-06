$(function () {
    function handleJSON(jsonData) {
        return jsonData;
    }
    $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'http://127.0.0.1:8000/grafik/data',
        dataType: 'json',
        success: function (data) {
            // var parsed_response = jQuery.parseJSON(data[0]['datapasar'][0]['dataharga'][0]);
            // console.log(data[0]['datapasar'][0]['dataharga']);
            datacompile = data;
            console.log(datacompile);
            getData(datacompile);
        },
        error: function () {
            console.log(data);
        }
    });
});

function getData(datagrafik) {
    // console.log(datagrafik[0]['datapasar'].length);
    for (let i = 0; i < datagrafik.length; i++) {
        for (let l = 0; l < datagrafik[i]['datapasar'].length; l++) {
            untukidchart = i + datagrafik[i]['category'] + datagrafik[i]['datapasar'][l]['pasar_id'];
            my_chart(datagrafik[i], untukidchart, l);
            // console.log(untukidchart);
        }
    }
}


function my_chart(res, idchart, l) {
    // console.log(response[0]['name']);
    var d = new Date();
    // console.log(idchart);
    d.setDate(d.getDate() - 6);
    const chart = Highcharts.chart('chart' + idchart, {
        title: {
            text: "Harga " + res['category'] + " di " + res['datapasar'][l]['nama_pasar'] + " 7 Hari Terakhir",
            align: 'left'
        },
        accessibility: {
            enabled: false
        },

        subtitle: {
            text: 'Kategori Beras',
            align: 'left'
        },

        yAxis: {
            title: {
                text: 'Harga'
            }
        },

        xAxis: {
            accessibility: {
                rangeDescription: 'Range: 2010 to 2020'
            },
            title: {
                text: 'Tanggal'
            },
            type: 'datetime'
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: Date.UTC(d.getUTCFullYear(), d.getUTCMonth(), d.getUTCDate()),
                pointInterval: 24 * 3600 * 1000 // one day
            }
        },
        series: res['datapasar'][l]['dataharga'],
        // series: res[idchart]['dataharga'],
        // series: [{
        //     name: "Harga",
        //     data: [14000, 14300, 14900, 15300, 14200, 15600, 15500]
        // }, {
        //     name: 'Harga Beras Mayang',
        //     data: [12500, 12300, 13200, 13300, 13100, 13200, 13500]
        // }, {
        //     name: 'Harga Beras Rata-Rata',
        //     data: [13000, 13300, 13800, 14300, 14100, 15200, 15100]
        // }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
    // document.addEventListener('DOMContentLoaded', function() {
    // });
}
