import React, {Component} from "react";
import axios from "axios";

class Home extends Component {
    constructor(props) {
        super(props);

        this.state = {
            devices: [],
            loading: true,
        }
    }

    async componentDidMount() {
        const auth_token = localStorage.getItem('auth_token');
        const headers = {
            Authorization: `Bearer ${auth_token}`
        };

        const resDevices = await axios.get('api/devices',{ headers });
        if (resDevices.data.success === true) {
            this.setState({
                    devices: resDevices.data.data,
                    loading: false
                }
            )
        }
    }

    render() {
        let device_HTMLTABLE = "";
        if (this.state.loading) {
            device_HTMLTABLE = <tr>
                <td colSpan="5"><h4>Lütfen Bekleyiniz..</h4></td>
            </tr>
        } else {
            device_HTMLTABLE =
                this.state.devices.map((item) => {
                    return (
                        <tr key={item.id}>
                            <td>{item.device_token}</td>
                            <td>{item.is_premium === 1 ? 'Premium' : '-'}</td>
                            <td>{item.last_activity}</td>
                        </tr>
                    );
                });
        }
        return (
            <div className="col-md-12 mt-3">
                <div className="card">
                    <div className="card-header">
                        <div className="row">
                            <h4> Abonelikler</h4>
                        </div>

                    </div>
                    <div className="card-body">
                        <table className="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Device Token</th>
                                <th>Premium</th>
                            </tr>
                            </thead>
                            <tbody>
                            {device_HTMLTABLE}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        )
    }
}

export default Home;
