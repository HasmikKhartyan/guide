///////////////////////////////////////////


// // Get address from latidude & longitude.
// Geocode.fromLatLng("48.8583701", "2.2922926").then(
//     response => {
//         const address = response.results[0].formatted_address;
//         console.log(address);
//     },
//     error => {
//         console.error(error);
//     }
// );

// Get latidude & longitude from address.
// Geocode.fromAddress("Spitak").then(
//     response => {
//         const { lat, lng } = response.results[0].geometry.location;
//         console.log(lat, lng);
//     },
//     error => {
//         console.log(error,4444);
//     }
// );
////////////////////////////////////////////

async save(){
    const target = this.refs;
    const name = target.name.value;
    const surname = target.surname.value;
    const phone = target.phone.value;
    const email = target.email.value;
    var newContact = {
        id:this.props.marker.id,
        name : name,
        surname: surname,
        phone : phone,
        email : email
    };

    if(JSON.stringify(newContact) != JSON.stringify(this.props.marker) ){
        const response = await fetch( `/api/markers/${this.props.marker.id}`, {
            method:'put',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(newContact)
        });
        const data =await response.json();
        if(!data.errors){
            this.setState({marker: newContact});
            this.setState({ editable: false });
        }else {
            this.setState({errors:data.errors});
        }
    }else{
        this.setState({ editable: false });
    }

}