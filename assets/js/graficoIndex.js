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
var estatus;

// Production
const pathTograficoIndex = window.location.protocol+"//"+window.location.host+"/functions/graficoIndex.php";

// Ambiente de teste mudar para algo semelhante a: pathTograficoIndex = window.location.protocol+"//"+window.location.host+"/unidentisdigital/functions/graficoIndex.php"

document.addEventListener("click", (e) => {
  et = e.target;
  if (et.classList.contains("pag-pendente")) {
    dia.value = '7';
    estatus = et.getAttribute("status");
    if(!chart.classList.contains("show")){
      chart.classList.toggle("show");
    }
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
        {
          dia: "7",
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
  } else if(et.classList.contains("novas")){
    dia.value = '7';
    estatus = et.getAttribute("status");
    if(!chart.classList.contains("show")){
      chart.classList.toggle("show");
    }
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
        {
          dia: "7",
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
                  borderColor: "rgb(0, 153, 255)",
                  backgroundColor: "rgba(0, 153, 255,.5)",
                  tension: 0.4,
                  fill: {
                    target: "origin",
                    above: "rgba(0, 153, 255,.25)", // Area will be red above the origin
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
  } else if(et.classList.contains("em-analise")){
    dia.value = '7';
    estatus = et.getAttribute("status");
    if(!chart.classList.contains("show")){
      chart.classList.toggle("show");
    }
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
        {
          dia: "7",
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
                  borderColor: "rgb(245, 103, 103)",
                  backgroundColor: "rgba(245, 103, 103,.5)",
                  tension: 0.4,
                  fill: {
                    target: "origin",
                    above: "rgba(245, 103, 103,.25)", // Area will be red above the origin
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
  } else if(et.classList.contains("canceladas")){
    dia.value = '7';
    estatus = et.getAttribute("status");
    if(!chart.classList.contains("show")){
      chart.classList.toggle("show");
    }
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
        {
          dia: "7",
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
                  borderColor: "rgb(166, 131, 235)",
                  backgroundColor: "rgba(166, 131, 235,.5)",
                  tension: 0.4,
                  fill: {
                    target: "origin",
                    above: "rgba(166, 131, 235,.25)", // Area will be red above the origin
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
  } else if(et.classList.contains("implantadas")){
    dia.value = '7';
    estatus = et.getAttribute("status");
    if(!chart.classList.contains("show")){
      chart.classList.toggle("show");
    }
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
        {
          dia: "7",
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
                  borderColor: "rgb(70, 190, 138)",
                  backgroundColor: "rgba(70, 190, 138,.5)",
                  tension: 0.4,
                  fill: {
                    target: "origin",
                    above: "rgba(70, 190, 138,.25)", // Area will be red above the origin
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
  } else if(et.classList.contains("indeferido")){
    dia.value = '7';
    estatus = et.getAttribute("status");
    if(!chart.classList.contains("show")){
      chart.classList.toggle("show");
    }
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
        {
          dia: "7",
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
                  borderColor: "rgb(220, 53, 69)",
                  backgroundColor: "rgba(220, 53, 69,.5)",
                  tension: 0.4,
                  fill: {
                    target: "origin",
                    above: "rgba(220, 53, 69,.25)", // Area will be red above the origin
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
  }
});

dia.addEventListener("change", (e) => {
  et = e.target;
  let dia = et.value;
  if (estatus == "PagPendente") {
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
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
                    above: "rgba(253, 203, 110,.25)", // Area will be red above the origin
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
  } else if(estatus == 'Novas') {
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
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
                  borderColor: "rgb(0, 153, 255)",
                  backgroundColor: "rgba(0, 153, 255,.5)",
                  tension: 0.4,
                  fill: {
                    target: "origin",
                    above: "rgba(0, 153, 255,.25)", // Area will be red above the origin
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
  } else if(estatus == 'EmAnalise') {
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
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
                  borderColor: "rgb(245, 103, 103)",
                  backgroundColor: "rgba(245, 103, 103,.5)",
                  tension: 0.4,
                  fill: {
                    target: "origin",
                    above: "rgba(245, 103, 103,.25)", // Area will be red above the origin
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
  }
  else if(estatus == 'Canceladas') {
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
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
                  borderColor: "rgb(166, 131, 235)",
                  backgroundColor: "rgba(166, 131, 235,.5)",
                  tension: 0.4,
                  fill: {
                    target: "origin",
                    above: "rgba(166, 131, 235,.25)", // Area will be red above the origin
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
  }
  else if(estatus == 'Implantadas') {
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
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
                  borderColor: "rgb(70, 190, 138)",
                  backgroundColor: "rgba(70, 190, 138,.5)",
                  tension: 0.4,
                  fill: {
                    target: "origin",
                    above: "rgba(70, 190, 138,.25)", // Area will be red above the origin
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
  }
  else if(estatus == 'Indeferido') {
    axios
      .post(
        pathTograficoIndex+"?status=" +
          estatus,
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
                  borderColor: "rgb(220, 53, 69)",
                  backgroundColor: "rgba(220, 53, 69,.5)",
                  tension: 0.4,
                  fill: {
                    target: "origin",
                    above: "rgba(220, 53, 69,.25)", // Area will be red above the origin
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
  }
});
