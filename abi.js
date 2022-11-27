abi = [{
        "inputs": [{
                "internalType": "string[]",
                "name": "_buyTime",
                "type": "string[]"
            },
            {
                "internalType": "string[]",
                "name": "_oId",
                "type": "string[]"
            },
            {
                "internalType": "string[]",
                "name": "_pId",
                "type": "string[]"
            },
            {
                "internalType": "uint256[]",
                "name": "_onePrice",
                "type": "uint256[]"
            },
            {
                "internalType": "uint256[]",
                "name": "_amount",
                "type": "uint256[]"
            },
            {
                "internalType": "uint256[]",
                "name": "_allPrice",
                "type": "uint256[]"
            },
            {
                "internalType": "string[]",
                "name": "_sId",
                "type": "string[]"
            },
            {
                "internalType": "string",
                "name": "_nowTime",
                "type": "string"
            }
        ],
        "name": "addBuyList",
        "outputs": [{
            "internalType": "uint256",
            "name": "",
            "type": "uint256"
        }],
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "inputs": [{
            "internalType": "uint256",
            "name": "_blockId",
            "type": "uint256"
        }],
        "name": "readBuyList",
        "outputs": [{
                "internalType": "string[]",
                "name": "",
                "type": "string[]"
            },
            {
                "internalType": "string[]",
                "name": "",
                "type": "string[]"
            },
            {
                "internalType": "string[]",
                "name": "",
                "type": "string[]"
            },
            {
                "internalType": "string[]",
                "name": "",
                "type": "string[]"
            },
            {
                "internalType": "uint256[]",
                "name": "",
                "type": "uint256[]"
            },
            {
                "internalType": "uint256[]",
                "name": "",
                "type": "uint256[]"
            },
            {
                "internalType": "string",
                "name": "",
                "type": "string"
            }
        ],
        "stateMutability": "view",
        "type": "function"
    },
    {
        "inputs": [{
            "internalType": "uint256",
            "name": "_blockId",
            "type": "uint256"
        }],
        "name": "readUpTime",
        "outputs": [{
            "internalType": "string",
            "name": "",
            "type": "string"
        }],
        "stateMutability": "view",
        "type": "function"
    }
]