$(function () {
    var id = document.getElementById("chartseminggu");
    id = id.getAttribute("data-id");
    var tahun = document.getElementById("chartsetahun");
    tahun = tahun.getAttribute("data-tahun");
    $.ajax({
        type: 'GET',
        url: "https://sembako.ditaria.com/grafikbarang/datamingguan/" + id,
        dataType: 'json',
        success: function (data) {
            // var parsed_response = jQuery.parseJSON(data[0]['datapasar'][0]['dataharga'][0]);
            // console.log(data[0]['datapasar'][0]['dataharga']);
            chartSeminggu(data);
        },
        error: function () {
            console.log(data);
            console.log("gagal");
        }
    });
    $.ajax({
        type: 'GET',
        url: "https://sembako.ditaria.com/grafikbarang/databulanan/" + id,
        dataType: 'json',
        success: function (data) {
            // var parsed_response = jQuery.parseJSON(data[0]['datapasar'][0]['dataharga'][0]);
            // console.log(data[0]['datapasar'][0]['dataharga']);
            chartBulanan(data);
        },
        error: function () {
            console.log(data);
            console.log("gagal");

        }
    });
    $.ajax({
        type: 'GET',
        url: "https://sembako.ditaria.com/grafikbarang/" + id + "/" + tahun,
        dataType: 'json',
        success: function (data) {
            // var parsed_response = jQuery.parseJSON(data[0]['datapasar'][0]['dataharga'][0]);
            // console.log(data[0]['datapasar'][0]['dataharga']);
            chartTahunan(data);
        },
        error: function () {
            console.log(data);
            console.log("gagal");

        }
    });
});

function chartSeminggu(dataseminggu) {
    var d = new Date();
    d.setDate(d.getDate() - 6);
    const chart = Highcharts.chart('chartseminggu', {
        title: {
            text: 'Harga Seminggu Terakhir',
            align: 'left'
        },
        accessibility: disabled,
        subtitle: {
            text: 'Harga ' + dataseminggu.nama,
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
                    connectorAllowed: true
                },
                pointStart: Date.UTC(d.getUTCFullYear(), d.getUTCMonth(), d.getUTCDate()),
                // pointInterval: 24 * 3600 * 1000 // one day
                pointIntervalUnit: 'day' // one day
            }
        },

        series: dataseminggu.data,
        // series: [{
        //     name: 'Lokasi Pasar Kahayan',
        //     data: [14100, 15200, 14900, 15300, 14200, 15600, 15500]
        // }, {
        //     name: 'Lokasi Pasar Besar',
        //     data: [14000, 15300, 14200, 15600, 15500, 14200, 15600]
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
}

function chartBulanan(datasebulan) {
    var d = new Date();
    // console.log(d);
    d.setDate(d.getDate() - 29);
    const chart = Highcharts.chart('chartsebulan', {
        title: {
            text: 'Harga 30 Hari Terakhir',
            align: 'left'
        },
        accessibility: disabled,
        subtitle: {
            text: 'Harga ' + datasebulan.nama,
            align: 'left'
        },

        yAxis: {
            title: {
                text: 'Harga'
            }
        },

        xAxis: {
            accessibility: {
                rangeDescription: 'Range: 2024 to 2024'
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
                    connectorAllowed: true
                },
                pointStart: Date.UTC(d.getUTCFullYear(), d.getUTCMonth(), d.getUTCDate()),
                // pointInterval: 24 * 3600 * 1000 // one day
                pointIntervalUnit: 'day' // one day
            }
        },

        series: datasebulan.data,

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
}

function chartTahunan(datasetahun) {
    var d = new Date();
    // console.log(d);
    // d.setDate(d.getDate() - 29);
    const chart = Highcharts.chart('chartsetahun', {
        title: {
            text: 'Harga Rerata Bulanan Tahun ' + d.getFullYear(),
            align: 'left'
        },
        accessibility: disabled,
        subtitle: {
            text: 'Harga ' + datasetahun.nama,
            align: 'left'
        },

        yAxis: {
            title: {
                text: 'Harga'
            }
        },

        xAxis: {
            accessibility: {
                rangeDescription: 'Range: 2010 to 2024'
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
                    connectorAllowed: true
                },
                pointStart: Date.UTC(d.getUTCFullYear(), 0, 1),
                // pointInterval: 24 * 3600 * 1000 // one day
                pointIntervalUnit: 'month' // one day
            }
        },

        series: datasetahun.data,

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
}