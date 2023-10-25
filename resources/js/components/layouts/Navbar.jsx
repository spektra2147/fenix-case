import React from "react";
import {Route, Routes, Navigate, Link} from 'react-router-dom';
import Login from "../auth/Login";
import Home from "../Home";
import swal from "sweetalert";

function Navbar() {
    const logoutSubmit = (e) => {
        e.preventDefault();

        localStorage.removeItem('auth_token');
        localStorage.removeItem('auth_name');
        localStorage.removeItem('auth_id');
        swal({
            title: "Başarılı",
            text: "Çıkış Başarılı",
            icon: "success",
            button: "Tamam",
        });
        navigation.navigate('/');
    }

    let AuthButtons = '';

    if (localStorage.getItem('auth_token')) {
        AuthButtons = (
            <ul className="navbar-nav">
                <li className="nav-item dropdown">
                    <Link className="nav-link dropdown-toggle" to="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">
                        {localStorage.getItem('auth_name')}
                    </Link>
                    <ul className="dropdown-menu">
                        <li><Link className="dropdown-item" onClick={logoutSubmit} to="/logout">Çıkış Yap</Link></li>
                    </ul>
                </li>
            </ul>
        );
    }

    return (
        <div className="container">
            <nav className="navbar navbar-expand-lg bg-light">
                <div className="container-fluid ">
                    <div className="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        {AuthButtons}
                    </div>
                </div>
            </nav>

            <Routes>
                <Route path="*" element={<Navigate to="/" replace/>}/>

                <Route path="/"
                       element={!localStorage.getItem('auth_token') ? <Navigate to="/login" replace/> : <Home/>}/>

                <Route path="/login"
                       element={<Login/>
                       }
                />
            </Routes>

        </div>
    )
}

export default Navbar
