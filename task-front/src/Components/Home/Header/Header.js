import React, { useEffect, useState } from 'react';
import './Header.css';
import { useSelector } from 'react-redux';
import { useNavigate } from 'react-router';
import { Link } from "react-router-dom";

function Header(props) {
    const news = useSelector((state) => state.news.values);
    const usenivicate = useNavigate();


    // const gottonews = (id) => {
    //     usenivicate('/news/' + id);
    // }

    return (
        <div className='Header'>
            <div className="container">
                <div className="row mb-2">
                    <div className="col-12 d-flex   pt-3">
                    </div>
                </div>


                <div className="row">
                    <div className="col-12 pb-5">

                        <section className="row">

                            <div className="col-12 col-md-6 pb-0 pb-md-3 pt-2 pr-md-1">
                                <div id="featured" className="carousel slide carousel" data-ride="carousel">

                                    <ol className="carousel-indicators top-indicator">
                                        <li data-target="#featured" data-slide-to="0" className="active"></li>
                                        <li data-target="#featured" data-slide-to="1"></li>
                                        <li data-target="#featured" data-slide-to="2"></li>
                                        <li data-target="#featured" data-slide-to="3"></li>
                                    </ol>

                                    {
                                        (news.length > 0) ?
                                            <div className="carousel-inner">
                                                {
                                                    news.slice(0, 1).map(data => (

                                                        <div className="carousel-item active" >
                                                            <Link className='text-decoration-none' to={'/news/' + data.id}>
                                                                <div className="card border-0 rounded-0 text-light overflow zoom">
                                                                    <div className="position-relative">

                                                                        <div className="ratio_left-cover-1 image-wrapper">
                                                                            <a href="#">
                                                                                <img className="img-fluid w-100 imgHeight "
                                                                                    src={data.image}
                                                                                    alt="#" />
                                                                            </a>
                                                                        </div>
                                                                        <div className="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">

                                                                            <a href="#">
                                                                                <h2 className="h3 post-title text-white my-1">{data.newsHeadline}</h2>
                                                                            </a>

                                                                            <div className="news-meta">
                                                                                <span className="news-author">by <a className="text-white font-weight-bold" href="#">Saif Jamal</a></span>
                                                                                <span className="news-date">{data.created_at}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </Link>
                                                        </div>

                                                    ))


                                                }

                                                {
                                                    news.slice(1, 4).map(data => (

                                                        <div className="carousel-item" >
                                                            <Link className='text-decoration-none' to={'/news/' + data.id}>
                                                                <div className="card border-0 rounded-0 text-light overflow zoom">
                                                                    <div className="position-relative">

                                                                        <div className="ratio_left-cover-1 image-wrapper">
                                                                            <a href="#">
                                                                                <img className="img-fluid w-100 imgHeight"
                                                                                    src={data.image}
                                                                                    alt="" />
                                                                            </a>
                                                                        </div>
                                                                        <div className="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">

                                                                            <a href="#">
                                                                                <h2 className="h3 post-title text-white my-1">{data.newsHeadline}</h2>
                                                                            </a>

                                                                            <div className="news-meta">
                                                                                <span className="news-author">by <a className="text-white font-weight-bold" href="#">saif jamal</a></span>
                                                                                <span className="news-date">{data.created_at}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </Link>
                                                        </div>

                                                    ))
                                                }


                                            </div>
                                            :
                                            <p>No News</p>
                                    }

                                </div>


                                <a className="carousel-control-prev" href="#featured" role="button" data-slide="prev">
                                    <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span className="sr-only">Previous</span>
                                </a>
                                <a className="carousel-control-next" href="#featured" role="button" data-slide="next">
                                    <span className="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span className="sr-only">Next</span>
                                </a>
                            </div>



                            <div className="col-12 col-md-6 pt-2 pl-md-1 mb-3 mb-lg-4">
                                <div className="row">

                                    {
                                        (news.length > 0) ?
                                            news.slice(0, 4).map(data => (
                                                <div className="col-6 pb-1 pt-0 pr-1" >
                                                    <Link className='text-decoration-none' to={'/news/' + data.id}>
                                                        <div className="card border-0 rounded-0 text-white overflow zoom" >
                                                            <div className="position-relative">

                                                                <div className="ratio_right-cover-2 image-wrapper">
                                                                    <a href="#">
                                                                        <img className="img-fluid imgheight2"
                                                                            src={data.image}
                                                                            alt="" />
                                                                    </a>
                                                                </div>
                                                                <div className="position-absolute p-2 p-lg-3 b-0 w-100 bg-shadow">

                                                                    <a className="p-1 badge badge-primary rounded-0" href="#">Lifestyle</a>


                                                                    <a href="#">
                                                                        <h2 className="h5 text-white my-1">{data.newsHeadline}</h2>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </Link>
                                                </div>
                                            ))
                                            :
                                            <p className='d-none'>No data</p>
                                    }




                                </div>
                            </div>

                        </section>

                    </div>
                </div>

            </div >
        </div >
    );
}

export default Header;
