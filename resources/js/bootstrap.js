import axios from 'axios'
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm'

window.axios = axios
window.Alpine = Alpine
window.Livewire = Livewire

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
