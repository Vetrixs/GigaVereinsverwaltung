import axios from 'axios'

export default () => {
   axios.defaults.withCredentials = true
}
