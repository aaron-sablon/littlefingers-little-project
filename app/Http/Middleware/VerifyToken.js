var jwt = require('jsonwebtoken');
var config = require('../config/config');

var ApiParams = require('../constants/ApiParams');
var Params = new ApiParams().params;

const UserModel  = require('../models/User');


function verifyToken(req, res, next) {

	var Params = new ApiParams().params;
	var token = req.query.token;
	
	if (! token) {

		Params.forced_login = true;
		Params.is_logged = false;
		Params.error = true;
		Params.status_code = 401;
		Params.msg = 'No token provided.';

		res.json( Params );
		return;
	}
	
	jwt.verify(token, config.secret, function(err, decoded) {
	
		if ( err ) {

			Params.forced_login = true;
			Params.is_logged = false;
			Params.error = true;
			Params.status_code = 401;
			Params.msg = 'Failed to authenticate token.';

			res.json( Params );
			return;
		}

		// If everything good, get user from token data and append it to request.
		req.userId = decoded.id; 
		req.user = decoded.user;
		req.perm = decoded.perm;
		req.token = token;
		next();
	});
}

module.exports = verifyToken;