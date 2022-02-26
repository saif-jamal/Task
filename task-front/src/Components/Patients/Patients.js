import React from 'react';
import './Patients.css';
import Header from './Header/Header';
import CardComponet from '../Includes/CardComponet/CardComponet';
import { useSelector } from 'react-redux';
import { Link } from 'react-router-dom';

function Patients() {
    const patients = useSelector((state) => state.patients.values);

    return (
        <div className='Patients '>
            <Header />
            <div className="Patientsection1 py-5 zoomOut">
                <div className="container-lg container-fluid">
                    <div className="row">

                        {
                            (patients.length > 0) ?
                                patients.map(data => (
                                    <div className="col-6 col-sm-6 col-md-3 my-2">
                                        <Link className='text-decoration-none' to={'/patients/' + data.id}>
                                            <CardComponet data={data} />
                                        </Link>
                                    </div>
                                ))
                                :
                                <p>No data</p>
                        }



                    </div>
                </div>
            </div>
        </div>
    );
}

export default Patients;
