import { Doughnut } from "vue-chartjs";

export default {
    extends: Doughnut,
    data() {
        return {
            chartData: {
                labels: ["Nigeria", "Others"],
                datasets: [
                    {
                        borderWidth: 1,
                        borderColor: [
                            "rgba(75, 192, 192, 1)",
                            "#466AD8"
                        ],
                        backgroundColor: [
                            "rgba(75, 192, 192, 0.2)",
                            "#466AD8"
                        ],
                        data: [1000, 500]
                    }
                ]
            },
            options: {
                legend: {
                    display: true
                },
                responsive: true,
                maintainAspectRatio: false
            }
        };
    },
    mounted() {
        this.renderChart(this.chartData, this.options);
    }
};
