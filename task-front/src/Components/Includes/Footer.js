import React from 'react';
import './Footer.css';

function Footer() {
    return (
        <div className='Footer '>
            <div className="footer-dark pt-5">
                <footer className='pt-5'>
                    <div className="container">
                        <div className="row">
                            <div className="col-sm-6 col-md-3 item">
                                <h3>Services</h3>
                                <ul>
                                    <li><a href="#">Analytics lab</a></li>
                                    <li><a href="#">siences</a></li>
                                    <li><a href="#">Services</a></li>
                                </ul>
                            </div>
                            <div className="col-sm-6 col-md-3 item">
                                <h3>About</h3>
                                <ul>
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Careers</a></li>
                                </ul>
                            </div>
                            <div className="col-md-6 item text">
                                <h3>Company Name</h3>
                                <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                            </div>
                            <div className="col item social">
                                <a href="#"><i className="fa-brands fa-facebook"></i></a>
                                <a href="#"><i className="fa-brands fa-twitter"></i></a>
                                <a href="#"><i className="fa-brands fa-snapchat"></i></a>
                                <a href="#"><i className="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                        <p className="copyright">Company Name Analytics Lab © 2022</p>
                        <div className="copyright">&copy; ALL OF THE RIGHTS RESERVED</div>
                    </div>
                </footer>
            </div>
        </div>
    );
}

export default Footer;
