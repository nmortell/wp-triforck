/**
 * Copyright 2006 - 2013 TubePress LLC (http://tubepress.org)
 *
 * This file is part of TubePress (http://tubepress.org)
 *
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/.
 */

(function () {

    /** http://ejohn.org/blog/ecmascript-5-strict-mode-json-and-more/ */
    'use strict';

	/* this stuff helps compression */
	var invoke = function (e, playerName, height, width, videoId, galleryId) {

        if (playerName !== 'vimeo') {

            return;
        }

        window.location = 'http://www.vimeo.com/' + videoId;
    };

	TubePress.Beacon.subscribe('tubepress.playerlocation.invoke', invoke);

}());