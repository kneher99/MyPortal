/****** Script for SelectTopNRows command from SSMS  ******/
SELECT TOP 1000 [ChartID]
      ,[mgUserID]
      ,[Active]
      ,[dt_log]
      ,[ComboID]
  FROM [MyPortal].[dbo].[tblMgChart_MgUser]

  select mcg.GroupNum1, mcg.GroupNum2, mu.mgUserID, mu.mgUserName
  from tblMgComboGroups mcg
  join tblMgChart_MgUser mcm on mcg.mathGroupComboID = mcm.ComboID
  join tblMgUsers mu on mcm.mgUserID = mu.mgUserID
  join tblMathGroupChart mgc on mcm.ChartID = mgc.ChartID
  where mgc.ChartID = '1FBE79A3-E46F-498C-A80F-1E0A572CF1E8'

DECLARE @newMemberID uniqueidentifier;
SET @newMemberID = NEWID();

  insert into tblMgComboGroups
  (mathGroupComboID, GroupNum1, GroupNum2, dt_log)
  values(
	@newMemberID
	,'E1'
	,'F4'
	,getDate()

  )

  insert into tblMgChart_MgUser
  (ChartID, mgUserID, Active, dt_log, ComboID)
  values(
	'1FBE79A3-E46F-498C-A80F-1E0A572CF1E8'
	,'B7069212-D2C1-4397-958E-245697A426A1'
	,1
	,getDate()
	,@newMemberID
  )

