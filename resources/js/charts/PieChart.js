import { Pie, mixins } from 'vue-chartjs'
const { reactiveProp } = mixins

export default {
  extends: Pie,
  mixins: [reactiveProp],
  props: ['options', 'chartData'],
  mounted () {
      console.log('About to mount')
        this.renderChart(this.chartData, this.options);
  }
}
