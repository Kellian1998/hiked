const url = 'http://www.infoclimat.fr/public-api/gfs/json?_ll=48.85341,2.3488&_auth=UUtQRwN9VXcALVFmVyFQeQJqV2JdK1N0US1RMgFkVyoCaVY3AmIAZlE%2FVSgFKlJkV3oDYF1mAjJWPQtzAHJSM1E7UDwDaFUyAG9RNFd4UHsCLFc2XX1TdFE7UTQBclc1AmlWNgJ%2FAGNRP1U1BStSZ1dmA2pdfQIlVjQLagBvUjVRMFAzA2JVMQBqUTRXeFB7AjdXN102U2tRNFFgAW1XNQJgVjYCMwBnUT5VNAUrUmFXZgNhXWcCOlY0C2sAZVIuUS1QTQMTVSoAL1FxVzJQIgIsV2JdPFM%2F&_c=9e5582a6d813dc78f3036a59307860f3';

var request = new Request(url, {
    method: 'POST',
});

fetch(url, {
    mode: "no-cors",
})
.then(function(data) {
  console.log(data)
})
.catch(function(error) {
  console.log(error);
});