// SPDX-License-Identifier: GPL-3.0
pragma solidity >=0.7.0 <0.9.0;

contract TranDetail {
    //購買紀錄 > 購買時間 處事ID 獎品ID 單價 購買數量 花費點數 學生ID 學生點數 上鏈時間
    //使用紀錄 > 
    //獎懲紀錄 > 

    mapping(uint => buyList) allBuyList; //區塊號碼 > (Id > 購買紀錄)
    mapping(uint => string) upTime; //上傳時間

    //購買紀錄
    struct buyList {
        string[] buyTime;
        string[] oId;
        string[] pId;
        uint[] onePrice;
        uint[] amount;
        uint[] allPrice;
        string[] sId;
    }
    //使用紀錄

    //獎懲紀錄
    
    //購買時間 處事ID 獎品ID 單價 購買數量 總花費點數 學生ID (學生點數) 上鏈時間 || 回傳 > 上鏈時間、區塊號碼
    function addBuyList(string[] memory _buyTime, string[] memory _oId, string[] memory _pId, uint[] memory _onePrice, uint[] memory _amount, uint[] memory _allPrice, string[] memory _sId, string memory _nowTime) public returns(uint) {
        uint blockId = block.number;
        allBuyList[blockId] = buyList(_buyTime, _oId, _pId, _onePrice, _amount, _allPrice, _sId);
        upTime[blockId] = _nowTime;

        return (blockId);
    }

    //查詢購買紀錄 區塊號碼 || 回傳 > 學生ID 購買時間 處事ID 獎品ID 單價 購買數量 上鏈時間 (學生點數)
    function readBuyList(uint _blockId) public view returns(string[] memory, string[] memory, string[] memory, string[] memory,
                                                            uint[] memory, uint[] memory, string memory) {
        uint blockId = _blockId;
        
        string[] memory sId = allBuyList[blockId].sId;
        string[] memory buyTime = allBuyList[blockId].buyTime;
        string[] memory oId = allBuyList[blockId].oId;
        string[] memory pId = allBuyList[blockId].pId;
        uint[] memory onePrice = allBuyList[blockId].onePrice;
        uint[] memory amount = allBuyList[blockId].amount;

        return (sId, buyTime, oId, pId, onePrice, amount, upTime[blockId]);
    }

    //查詢上鏈時間
    function readUpTime(uint _blockId) public view returns(string memory) {
        return upTime[_blockId];
    }

}