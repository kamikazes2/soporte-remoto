class ServiceProvider {
    constructor(services) {
        this._services = services;

        // use proxy to create a "magic getter" that will search the _services for a matching name
        // then call "_makeOnce" to instantiate or return the singleton
        return new Proxy(this, {
            get: (provider, service) => {
                service = service.charAt(0).toUpperCase() + service.slice(1);

                return provider._services[service] ? provider._makeOnce(service) : undefined;
            }
        });
    }

  /** @var {Object<Object>} **/
  _services = {};

  /** @var {Object<Object>} **/
  _singletons = {};

  /**
   * @param {String} service
   * @return {Object}
   * @private
   */
  _makeOnce(service) {
      if (!this._singletons[service]) {
          this._singletons[service] = new this._services[service]();
      }

      return this._singletons[service];
  }
}

export default (Vue, services) => {
    Vue.serviceProvider = new ServiceProvider(services);
};