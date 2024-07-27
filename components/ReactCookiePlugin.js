class ReactCookiePlugin extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            visible: true, // !Cookies.get('cookiesAllowedFromReactCookiePlugin') && !Cookies.get('cookiesDeclinedFromReactCookiePlugin'),
            author: "Barış E.",
        };
        this.acceptCookies = this.acceptCookies.bind(this);
        this.declineCookies = this.declineCookies.bind(this);
    }

    acceptCookies() {
        Cookies.set('cookiesAllowedFromReactCookiePlugin', true);
        this.setState({
            ...this.state,
            visible: false
        });
    }

    declineCookies() {
        Cookies.set('cookiesDeclinedFromReactCookiePlugin', false);
        this.setState({
            ...this.state,
            visible: false
        });
    }

    render() {
        return this.state.visible ? (
            <div className='CookieBanner container fixed-bottom alert alert-light border alert-dismissible fade show' role='alert' ref='cookieBanner'>
                <div className='row justify-content-between align-items-stretch'>
                    <div className='col-1 h-full d-flex align-items-center justify-content-center'>
                        <img src={this.props.pluginUrl + 'assets/cookie.png'} width='100px' />
                    </div>
                    <div className='col-8'>
                        <p className='m-0 fw-bolder'>Are you okay with Cookies?</p>
                        <p className='lh-base fs-6 m-0'>Cookies let us give you a better experience and improve our products.<br />We won't turn them until you accept.</p>
                    </div>
                    <div className='col-2'>
                        <div className='row'>
                            <button id='accept' onClick={this.acceptCookies} type='button' className='btn btn-info text-white mb-2'>Accept</button>
                            <button id='decline' onClick={this.declineCookies} type='button' className='btn btn-outline-info'>Decline</button>
                        </div>
                    </div>
                </div>
            </div>
        ) : null;
    }
}