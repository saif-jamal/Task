import React, { useEffect } from 'react';
import './Section2.css';

function Section2() {

    useEffect(() => {
        document.querySelector('#contact-form').addEventListener('submit', (e) => {
            e.preventDefault();
            e.target.elements.name.value = '';
            e.target.elements.email.value = '';
            e.target.elements.message.value = '';
        });

    }, []);

    return (
        <div className='Section2'>
            <section id="contact">

                <h1 className="section-header">Contact</h1>

                <div className="contact-wrapper">



                    <form id="contact-form" className="form-horizontal" role="form">

                        <div className="form-group">
                            <div className="col-sm-12">
                                <input type="text" className="form-control" id="name" placeholder="NAME" name="name" required />
                            </div>
                        </div>

                        <div className="form-group">
                            <div className="col-sm-12">
                                <input type="email" className="form-control" id="email" placeholder="EMAIL" name="email" required />
                            </div>
                        </div>
                        <div className="col-sm-12">
                           <textarea className="form-control w-100" rows="10" placeholder="MESSAGE" name="message" required></textarea>
                        </div>
                        <button className="btn btn-primary send-button w-50 d-flex justify-content-center align-items-center mx-auto " id="submit" type="submit" value="SEND">
                            <div className="alt-send-button">
                                <i className="fa fa-paper-plane"></i><span className="send-text">SEND</span>
                            </div>
                        </button>

                    </form>



                    <div className="direct-contact-container">

                        <ul className="contact-list">
                            <li className="list-item"><i className="fa fa-map-marker fa-2x"><span className="contact-text place">City, Baghdad</span></i></li>

                            <li className="list-item"><i className="fa fa-phone fa-2x"><span className="contact-text phone"><a href="tel:1-212-555-5555" title="Give me a call">(964) 07500-677-192</a></span></i></li>

                            <li className="list-item"><i className="fa fa-envelope fa-2x"><span className="contact-text gmail"><a href="mailto:#" title="Send me an email">saif.jamal6173@gmail.com</a></span></i></li>

                        </ul>

                        <hr />
                        <ul className="social-media-list">
                            <li><a href="#" target="_blank" className="contact-icon">
                                <i class="fa-brands fa-github"></i></a>
                            </li>
                            <li><a href="#" target="_blank" className="contact-icon">
                                <i class="fa-brands fa-codepen"></i></a>
                            </li>
                            <li><a href="#" target="_blank" className="contact-icon">
                                <i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li><a href="#" target="_blank" className="contact-icon">
                                <i class="fa-brands fa-instagram"></i></a>
                            </li>
                        </ul>
                        <hr />



                    </div>

                </div>

            </section>
        </div>
    );
}


export default Section2;
