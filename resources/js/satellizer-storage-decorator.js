/*
Satellizer's storage service can use 'localStorage' and 'sessionStorage' by default.
None of these options work well if you need to use Satellizer with or across subdomains.
(Given, there is the fun iframe and postMessage workaround, but that's really inconvenient.)
Here's a simple approach using cookies for storage, which can be used across subdomains
(since cookies can be used across subdomains, right?).
By default, $http is configured with withCredentials set to false, so the cookies themselves
won't be sent to the server.
Simply add this after you load Satellizer.
Requires ngCookies.
*/

angular.module('satellizer')
.requires.push('ngCookies');

angular.module('satellizer')
/*.config([ 'envServiceProvider', function(envServiceProvider) {
	envServiceProvider.config({
		domains: {
			development: ['localhost', 'kisikisi.dev'],
			production: ['103.11.74.10', 'kisikisi.id']
		},
		vars: {
			development: {
				domain: '.kisikisi.dev'

			},
			production: {
				domain: '.kisikisi.id'
			}
		}
	});

	// run the environment check, so the comprobation is made
	// before controllers and services are built
	envServiceProvider.check();

}])*/
.decorator('SatellizerStorage', ['$delegate','$cookies',
function($delegate, $cookies) {
  //var env = envService.read('all');

  var host = window.location.host;
  var host = host.split('.');
  if (host[1] == 'id' || host[2] == 'id') domain = '.kisikisi.id';
  else if (host[1] == 'dev' || host[2] == 'dev') domain = '.kisikisi.dev';

  //console.log(domain);
  var storage = {
    get: function(key) {
      return $cookies.get(key);
    },
    set: function(key, value) {
      // TODO: Replace '.domain' with your domain!
      $cookies.put(key, value, { path: '/', domain: domain });
    },
    remove: function(key) {
      $cookies.remove(key, { path: '/', domain: domain });
    }
  };

  return storage;
}]);
