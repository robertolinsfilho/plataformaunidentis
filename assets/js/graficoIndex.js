let dia = document.querySelector("#dia");
let btn = document.querySelector("#btn");
let openChart = document.querySelector(".openChart");
let chart = document.querySelector("#chart");
let loader = document.querySelector("div#loader");
let verify = false;
var doGarfico;
var datas;
var vendas;
var ctx;
var myChart;
openChart.addEventListener('click', e => {
  chart.classList.toggle("show");
  axios
    .post(
      "http://localhost:8080/AmbienteTeste/uniDigital/functions/graficoIndex.php",
      {
        dia: '7',
      },
      {
        onUploadProgress: (e) => {
            let progress = Math.round((e.loaded * 100) / e.total);

            loader.style.visibility = "visible";
        },
      }
    )
    .then((res) => {
      if (res.status == 200) {
        loader.style.visibility = "hidden";
        doGarfico = res.data;
        datas = Object.keys(doGarfico);
        vendas = Object.values(doGarfico);
        if (verify == true) myChart.destroy();
        ctx = document.getElementById("myLineChart");
        myChart = new Chart(ctx, {
          type: "line",
          data: {
            labels: datas.reverse(),
            datasets: [
              {
                label: "No",
                data: vendas.reverse(),
                fill: false,
                borderColor: "rgb(253, 203, 110)",
                backgroundColor: "rgba(253, 203, 110,.5)",
                tension: 0.4,
                fill: {
                  target: "origin",
                  above: "rgba(255, 234, 167,.25)", // Area will be red above the origin
                },
              },
            ],
          },
          options: {
            plugins: {
              legend: {
                display: false,
              },
            },
            scales: {
              y: {
                beginAtZero: true,
              },
            },
          },
        });
        setTimeout(() => {
          verify = true;
        }, 50);
      }
    })
    .catch((error) => {
      console.log(error);
    });
})
dia.addEventListener("change", (e) => {
  et = e.target;
  let dia = et.value;
  axios
    .post(
      "http://localhost:8080/AmbienteTeste/uniDigital/functions/graficoIndex.php",
      {
        dia: dia,
      },
      {
        onUploadProgress: (e) => {
            let progress = Math.round((e.loaded * 100) / e.total);

            loader.style.visibility = "visible";
        },
      }
    )
    .then((res) => {
      if (res.status == 200) {
        loader.style.visibility = "hidden";
        doGarfico = res.data;
        datas = Object.keys(doGarfico);
        vendas = Object.values(doGarfico);
        if (verify == true) myChart.destroy();
        ctx = document.getElementById("myLineChart");
        myChart = new Chart(ctx, {
          type: "line",
          data: {
            labels: datas.reverse(),
            datasets: [
              {
                label: "No",
                data: vendas.reverse(),
                fill: false,
                borderColor: "rgb(253, 203, 110)",
                backgroundColor: "rgba(253, 203, 110,.5)",
                tension: 0.4,
                fill: {
                  target: "origin",
                  above: "rgba(255, 234, 167,.25)", // Area will be red above the origin
                },
              },
            ],
          },
          options: {
            plugins: {
              legend: {
                display: false,
              },
            },
            scales: {
              y: {
                beginAtZero: true,
              },
            },
          },
        });
        setTimeout(() => {
          verify = true;
        }, 50);
      }
    })
    .catch((error) => {
      console.log(error);
    });
});
