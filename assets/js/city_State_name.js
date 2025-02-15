let statesData = "";
            fetch('json/state_city.json')
            .then(response => response.json())
            .then(data => {
                // Store the loaded JSON data in a variable
                statesData = data;
                // console.log(statesData);

                let stateDropdown = document.getElementById("state");
                statesData.states.forEach(function (state) {
                    let option = document.createElement("option");
                    option.value = state.state;
                    option.text = state.state;
                    stateDropdown.add(option);
                });
            })
            .catch(err => console.log("Record Not Fetching"));

            function updateCityDropdown() {

                let selectedState = document.getElementById("state").value;
                console.log(selectedState);
                let cityDropdown = document.getElementById("city");
                // let selectedState = stateDropdown.value;

                // Clear existing options in the city dropdown
                cityDropdown.innerHTML = '<option value="" disabled selected>Select a city</option>';

                // Find the selected state in the JSON data
                let selectedStateData = statesData.states.find(state => state.state === selectedState);
                console.log(selectedStateData);

                // Populate the city dropdown with districts of the selected state
                if (selectedStateData && selectedStateData.districts) {
                    selectedStateData.districts.forEach(function (district) {
                        let option = document.createElement("option");
                        option.value = district;
                        option.text = district;
                        cityDropdown.add(option);
                    });
                }
            }