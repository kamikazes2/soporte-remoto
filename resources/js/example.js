// Part of main.js, adding ServiceProvder as Vue plugin
import ServiceProvider from '.ServiceProvider';
import MyService from '.MyService';

Vue.use(ServiceProvider, {
    MyService
});

// within a component
/*
export default {
    name: 'HelloWorld',
    methods: {
    getService: function () {
      return Vue.serviceProvider.myService;
    }
  },
};*/