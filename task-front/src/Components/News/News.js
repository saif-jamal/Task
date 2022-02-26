import React from 'react';
import './News.css';

import NewsHeader from './Header/NewsHeader';
import CardCompontent2 from '../Includes/CardComponet/CardCompontent2';
import { useSelector } from 'react-redux';

function News() {
    const news = useSelector((state) => state.news.values);

    return (
        <div className='News pt-5'>
            <NewsHeader />

            <div className="NewsSection1 zoomOut2 py-5">
                <div className="container-lg container-fluid">
                    <div className="row">
                        {
                            (news.length > 0) ?
                                news.map(data => (
                                    <div className="col-6 col-sm-6 col-md-4 text-white my-2">
                                        <CardCompontent2 data={data} />
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

export default News;
