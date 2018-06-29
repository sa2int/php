//======================================================================================//
//
//							ゲームプログラム
//
//======================================================================================//
#include		<windows.h>
#include		<stdio.h>
#include		<math.h>
#include		"MASTER/Ci-Lib.H"
#include		"Game.H"

//****************************************************************************
//	■	定義
//
//****************************************************************************
#define		OBJ_MAX			50
#define		OBJ_W			150
#define		OBJ_H			150
#define		NUM_W			35
#define		NUM_H			52
#define		BD_MAX			97		// 出現データ数
#define		BaikSPEED		10.0f
#define		TIME_S			60		//1s

#define		NUM_X			75	
#define		NUM_X1			(75+NUM_W)
#define		NUM_X2			(75+NUM_W*2)
#define		NUM_X3			(75+NUM_W*3)
#define		NUM_X4			(75+NUM_W*4)
#define		NUM_X5			(75+NUM_W*5)
#define		NUM_Y			180

#define		G_W				500
#define		G_H				150
#define		P_W				550
#define		P_H				130

typedef struct {
	float MeatX;
	float MeatY;
	float VegiX;
	float VegiY;
	float ChezX;
	float ChezY;
	float PanUX;
	float PanUY;
	float PanDX;
	float PanDY;
	
}PX;

typedef struct {
	float MeatDX;
	float MeatDy;
	float VegiDX;
	float VegiDY;
	float ChezDX;
	float ChezDY;
	float PanUDY;
	float PanDDY;
}DXY;

typedef struct
{
	short MeatF;
	short VegiF;
	short ChezF;
	short PanF;
	short PanMF;

}FLAG;

typedef struct {
	float Px, Py;
	float Dx, Dy;
	short Flg;
}NORTS;

// 管理 DATA
typedef struct {
	short	TimStep;	// 現在のデータテーブルの進行数
	short	TimCnt;		// フレームカウント
}GMDAT;

// データテーブル情報
typedef struct {
	short	Time;
	short	x;
	short	y;
	float	dx;
	float	dy;
}BONDAT;

typedef struct {
	short GameCnt;
	short GameCntApp;
	
}TIMER;

typedef struct {

	float Kx;
	float Kx2;
	float Kx3;
	float Kx4;
	float Kx5;
}KYORI;


//****************************************************************************
//	■	内部使用　変数
//
//****************************************************************************
//------------全部に使っている画像------------//
GsTEXTURE	BG;

//------------ハンバーガーの画像-------------//
GsTEXTURE	PanU;
GsTEXTURE	PanD;
GsTEXTURE	Meat;
GsTEXTURE	Vegi;
GsTEXTURE	Chez;

//------------ゲージの画像-------------//
GsTEXTURE	GageF; 
GsTEXTURE	Gage;

//------------バイキンの画像-------------//
GsTEXTURE	Baik;

//------------UIの画像-------------//
GsTEXTURE	T_Flame;
GsTEXTURE	TimeNum;
GsTEXTURE	S_Flame;
GsTEXTURE	ScoreNum;
GsTEXTURE	P_Flame;
GsTEXTURE	PointNum;

GsSOUND		GBGM;
GsSOUND		Over;
GsSOUND		Limit;
GsSOUND		Hasa;
GsSOUND		Drop;

PX Px;
DXY D;
FLAG Flg;
NORTS	Obj[OBJ_MAX];
TIMER Game;
KYORI Kyori;

short GFlg;
short GageH;
short GageApp;
short Task;
short GagePy;
short GageTask;
short GameOverTask;
short Mode;
short TNum;
short _timer;
short CC;
short CCA;
short _score;
short Count;
int Point;
int Point1;
int Point2;
int Point3;
short PCnt, PApp;
short SCnt, SCntApp;
short GDFlg;
short SpeedPtn[10];
short SpeedPtnCnt, SpeedPtnApp;
short SoundCnt[5], SoundApp[5];
//------------データテーブル関係-------------//
GMDAT		Gm;

//-------------------------------------------------------------------------------------//
// 出現情報　データテーブル BORN DATA
//-------------------------------------------------------------------------------------//
BONDAT	BonTBL[BD_MAX] = {
	//	 Time	
	{ 2 * 60,	1980,375,	-BaikSPEED , 0.0f },
	{ 3 * 60,	0,775,		BaikSPEED , 0.0f },
	{ 4 * 60,	1920,375,	-BaikSPEED , 0.0f },
	{ 5 * 60,	1920,375,	-BaikSPEED, 0.0f },
	{ 6 * 60,	1920,375,	-BaikSPEED , 0.0f },
	{ 7 * 60,	1920,375,	-BaikSPEED , 0.0f },
	{ 8 * 60,	1920,375,	-BaikSPEED , 0.0f },
	{ 9 * 60,	1920,375,	-BaikSPEED, 0.0f },
	{ 10 * 60,	1920,375,	-BaikSPEED , 0.0f },
	{ 11 * 60,	1920,375,	-BaikSPEED , 0.0f },
	{ 12 * 60,	1920,375,	-BaikSPEED , 0.0f },
	{ 13 * 60,	1920,375,	-BaikSPEED ,  0.0f },
	{ 14 * 60,	1920,375,	-BaikSPEED , 0.0f },

	-1
};


//--------------------------------------------------------------------------//
//	●	初期化		：シーンに移る時一回、変数の初期化
//
//--------------------------------------------------------------------------//
void	GameInit(void)
{
	Kyori.Kx  = 0;
	Kyori.Kx2 = 0;
	Kyori.Kx3 = 0;
	Kyori.Kx4 = 960;
	Kyori.Kx5 = 0;

	Px.MeatX = 960;
	Px.MeatY = 530;
	Px.VegiX = 960;
	Px.VegiY = 750;
	Px.ChezX = 960;
	Px.ChezY = 300;
	Px.PanUX = 968;
	Px.PanUY = 100;
	Px.PanDX = 960;
	Px.PanDY = 940;
	GagePy   = 840;

	D.PanUDY = 0.0f;

	GFlg = ON;
	GageH = 586;
	GageApp = 5;
	GageTask = 0;

	Flg.MeatF = ON;
	Flg.VegiF = ON;
	Flg.ChezF = ON;
	Flg.PanF  = OFF;
	Flg.PanMF = OFF;

	Task = 0;
	Mode = 0;

	TNum = 8;

	_score = 0;
	Count = 0;

	PCnt = 0;
	PApp = 1;

	SCnt = 0;
	SCntApp = 1;

	GDFlg = ON;

	SpeedPtnCnt = 0;

	// OBJ
	for (short i = 0; i<OBJ_MAX; i++) {
		Obj[i].Flg = OFF;
	
	}
	// Manage
	Gm.TimStep = 0;
	Gm.TimCnt = 0;

	Game.GameCnt = 60*60;
	Game.GameCntApp = 1;

	CC = 0;
	CCA = 1;

	Point = 0;
	Point1 = 1000;
	Point2 = 5000;
	Point3 = 10000;
	
	LIMIT(Point, 0, 999999);

	for (short i = 0; i < 5; i++){

		SoundCnt[i] = 0;
		SoundApp[i] = 1;
	}
}

//--------------------------------------------------------------------------//
void	ObjBorn(short x, short y, float dx, float dy) {

	for (short i = 0; i < OBJ_MAX; i++) {

		if (Obj[i].Flg == OFF) {
			Obj[i].Flg = ON;
			Obj[i].Px = F(x);
			Obj[i].Py = F(y);

			Obj[i].Dx = F(dx);
			Obj[i].Dy = F(dy);

			break;
		}
	}
}

//--------------------------------------------------------------------------//
//	●	スコア
//
//--------------------------------------------------------------------------//
void	Score(void) {

	Kyori.Kx = Px.ChezX - Px.MeatX;
	Kyori.Kx2 = Px.MeatX - Px.VegiX;

	if (Kyori.Kx <= 0) {
		Kyori.Kx = -Kyori.Kx;
	}

	if (Kyori.Kx2 <= 0) {
		Kyori.Kx2 = -Kyori.Kx2;
	}

	Kyori.Kx3 = Kyori.Kx + Kyori.Kx2;

	Kyori.Kx5 = Kyori.Kx4 - Kyori.Kx3;


	if (Kyori.Kx5 <= 0) {
		Kyori.Kx5 = -Kyori.Kx5;
	}

	PCnt = PCnt + PApp;

	if (Kyori.Kx5 <= 200) {
		if (PCnt <= 2 && PCnt >= 2) {
			Point = Point + Point3;
		}
	}

	if (Kyori.Kx5 >= 151 && Kyori.Kx5 <= 349) {
		if (PCnt <= 2 && PCnt >= 2) {
			Point = Point + Point2;
		}
	}

	if (Kyori.Kx5 >= 350) {
		if (PCnt <= 2 && PCnt >= 2) {
			Point = Point + Point1;
		}
	}

	if (PCnt >= 3) {
		PCnt = 0;
		PApp = 0;
	}

}

//--------------------------------------------------------------------------//
//	●	具材スピード処理
//
//--------------------------------------------------------------------------//
void	GuzaiMovePtn(void) {

	if (SpeedPtnCnt == 0) {
		D.MeatDX = 11.0f;
		D.VegiDX = -12.0f;
		D.ChezDX = 10.6f;
	}

	if (SpeedPtnCnt == 1) {
		D.MeatDX = -14.0f;
		D.VegiDX = 10.0f;
		D.ChezDX = 13.7f;
	}

	if (SpeedPtnCnt == 2) {
		D.MeatDX = -7.0f;
		D.VegiDX = 6.0f;
		D.ChezDX = 9.0f;
	}

	if (SpeedPtnCnt == 3) {
		D.MeatDX = 7.0f;
		D.VegiDX = -11.0f;
		D.ChezDX = -9.5f;
	}

	if (SpeedPtnCnt == 4) {
		D.MeatDX = 16.0f;
		D.VegiDX = -11.2f;
		D.ChezDX = 8.0f;
	}

	if (SpeedPtnCnt == 5) {
		D.MeatDX = -10.0f;
		D.VegiDX = -12.5f;
		D.ChezDX = 6.0f;
	}

	if (SpeedPtnCnt == 6) {
		D.MeatDX = -9.0f;
		D.VegiDX = -7.5f;
		D.ChezDX = -12.0f;
	}

	if (SpeedPtnCnt == 7) {
		D.MeatDX = 8.7f;
		D.VegiDX = 9.0f;
		D.ChezDX = -11.0f;
	}

	if (SpeedPtnCnt == 8) {
		D.MeatDX = 10.5f;
		D.VegiDX = -8.7f;
		D.ChezDX = 11.0f;
	}

	if (SpeedPtnCnt == 9) {
		D.MeatDX = 10.0f;
		D.VegiDX = -8.5f;
		D.ChezDX = 9.3f;
	}
}

//--------------------------------------------------------------------------//
//	●	パン処理(弱)
//
//--------------------------------------------------------------------------//
void	PanMove1(void)
{
	if (Mouse.Trg &_lMOUSE) {
		Flg.PanF = ON;
		
	}
	SoundCnt[1] = SoundCnt[1] + SoundApp[1];

	if (SoundCnt[1] >= 1 && SoundCnt[1] <= 1) {
		Gs_PlaySE(Drop);
	}
	if (SoundCnt[1] >= 2) {
		SoundCnt[1] = 0;
		SoundApp[1] = 0;
	}

	if (Flg.PanF == ON) {
		Flg.PanMF = ON;
	}

	if (Flg.PanMF == ON) {
		Px.PanUY = Px.PanUY + D.PanUDY;
		D.PanUDY = 9.0f;
	}

	if (Px.PanUY >= 650) {
		D.PanUDY = 0.0f;
		D.MeatDy = 0.0f;
		D.ChezDY = 0.0f;
		D.VegiDY = 0.0f;
		Flg.PanMF = OFF;
		Flg.MeatF = OFF;
		Flg.VegiF = OFF;
		Flg.ChezF = OFF;
		Task = 1;
		Score();
	}

	if (Task == 1 && Mouse.Trg &_lMOUSE) {
		GFlg = ON;
		Task = 0;
		Px.MeatX = 960;
		Px.MeatY = 530;
		Px.VegiX = 960;
		Px.VegiY = 750;
		Px.ChezX = 960;
		Px.ChezY = 300;
		Px.PanUX = 960;
		Px.PanUY = 100;
		Px.PanDX = 960;
		Px.PanDY = 950;
		D.PanUDY = 0.0f;
		Flg.MeatF = ON;
		Flg.VegiF = ON;
		Flg.ChezF = ON;
		GageApp = 2;
		PApp = 1;
		_score++;
		SoundApp[1] = 1;
		SpeedPtnCnt++;
		GuzaiMovePtn();
		GageH = 586;
		GagePy = 840;
		Gs_StopMUSIC(Drop);
	}
	if (SpeedPtnCnt >= 10) {
		SpeedPtnCnt = 0;
	}
}

//--------------------------------------------------------------------------//
//	●	パン処理(中)
//
//--------------------------------------------------------------------------//
void	PanMove2(void)
{
	if (Mouse.Trg &_lMOUSE) {
		Flg.PanF = ON;
	}
	SoundCnt[1] = SoundCnt[1] + SoundApp[1];

	if (SoundCnt[1] >= 1 && SoundCnt[1] <= 1) {
		Gs_PlaySE(Drop);
	}
	if (SoundCnt[1] >= 2) {
		SoundCnt[1] = 0;
		SoundApp[1] = 0;
	}

	if (Flg.PanF == ON) {
		Flg.PanMF = ON;
	}

	if (Flg.PanMF == ON) {
		Px.PanUY = Px.PanUY + D.PanUDY;
		D.PanUDY = 9.0f;
	}

	if (Px.PanUY >= 650) {
		D.PanUDY = 0.0f;
		D.MeatDy = 0.0f;
		D.ChezDY = 0.0f;
		D.VegiDY = 0.0f;
		Flg.PanMF = OFF;
		Flg.MeatF = OFF;
		Flg.VegiF = OFF;
		Flg.ChezF = OFF;
		Task = 1;
		Score();
	}

	if (Task == 1 && Mouse.Trg &_lMOUSE) {
		GFlg = ON;
		Task = 0;
		Px.MeatX = 960;
		Px.MeatY = 530;
		Px.VegiX = 960;
		Px.VegiY = 750;
		Px.ChezX = 960;
		Px.ChezY = 300;
		Px.PanUX = 960;
		Px.PanUY = 100;
		Px.PanDX = 960;
		Px.PanDY = 950;
		D.PanUDY = 7.0f;
		Flg.MeatF = ON;
		Flg.VegiF = ON;
		Flg.ChezF = ON;
		GageApp = 2;
		PApp = 1;
		_score++;
		SpeedPtnCnt++;
		GuzaiMovePtn();
		GageH = 586;
		GagePy = 840;
		SoundApp[1] = 1;
		Gs_StopMUSIC(Drop);
	}

	if (SpeedPtnCnt >= 10) {
		SpeedPtnCnt = 0;
	}
}

//--------------------------------------------------------------------------//
//	●	パン処理(強)
//
//--------------------------------------------------------------------------//
void	PanMove3(void)
{
	

	if (Mouse.Trg &_lMOUSE) {
		Flg.PanF = ON;
	}

	SoundCnt[1] = SoundCnt[1] + SoundApp[1];

	if (SoundCnt[1] >= 1 && SoundCnt[1] <= 1) {
		Gs_PlaySE(Drop);
	}
	if (SoundCnt[1] >= 2) {
		SoundCnt[1] = 0;
		SoundApp[1] = 0;
	}

	if (Flg.PanF == ON) {
		Flg.PanMF = ON;
	}

	if (Flg.PanMF == ON) {
		Px.PanUY = Px.PanUY + D.PanUDY;
		D.PanUDY = 14.0f;
	}

	if (Px.PanUY >= 650) {
		D.PanUDY = 0.0f;
		D.MeatDy = 0.0f;
		D.ChezDY = 0.0f;
		D.VegiDY = 0.0f;
		Flg.PanMF = OFF;
		Flg.MeatF = OFF;
		Flg.VegiF = OFF;
		Flg.ChezF = OFF;
		Task = 1;
		Score();
	}

	if (Task == 1 && Mouse.Trg &_lMOUSE) {
		GFlg = ON;
		Task = 0;
		Px.MeatX = 960;
		Px.MeatY = 530;
		Px.VegiX = 960;
		Px.VegiY = 750;
		Px.ChezX = 960;
		Px.ChezY = 300;
		Px.PanUX = 960;
		Px.PanUY = 100;
		Px.PanDX = 960;
		Px.PanDY = 950;
		Flg.MeatF = ON;
		Flg.VegiF = ON;
		Flg.ChezF = ON;
		GageApp = 2;
		PApp = 1;
		_score++;
		SpeedPtnCnt++;
		GuzaiMovePtn();
		GageH = 586;
		GagePy = 840;
		SoundApp[1] = 1;
		Gs_StopMUSIC(Drop);
	}

	if (SpeedPtnCnt >= 10) {
		SpeedPtnCnt = 0;
	}
}

//--------------------------------------------------------------------------//
//	●	ゲージ処理
//
//--------------------------------------------------------------------------//
void	GageStop(void)
{
	if (GFlg == ON) {
		GageApp = 5;
		GageH = GageH - GageApp;
		GagePy = GagePy - GageApp;
	}
	
	if (GageH <= 10) {
		GageH = 586;
		GagePy = 840;
	}

	if (GageH >= 380) {
		GageTask = 1;
	}

	if (GageH <= 377 && GageH >= 192) {
		GageTask = 2;
	}

	if (GageH <= 187) {
		GageTask = 3;
	}

	if (Mouse.Trg &_lMOUSE && GFlg == ON) {

		GFlg = OFF;
	}

	if (GFlg == OFF) {
		GageApp = 0;
	}

}

//--------------------------------------------------------------------------//
//	●	バイキン当たり判定
//
//--------------------------------------------------------------------------//
void	BaikinCheck(void) {
	
	for (short i = 0; i < OBJ_MAX; i++) {
		if ((Px.PanUX - (P_W / 2) <= Obj[i].Px + (OBJ_W / 2)) && (Px.PanUX + (P_W / 2) >= Obj[i].Px - (OBJ_W / 2)) && (Px.PanUY - (P_H / 2) <= Obj[i].Py + (OBJ_H / 2)) && (Px.PanUY + (P_H / 2) >= Obj[i].Py - (OBJ_H / 2))) {
			Obj[i].Flg = OFF;
			
		}
		if ((Px.PanUX - (P_W / 2) <= Obj[i].Px + (OBJ_W / 2)) && (Px.PanUX + (P_W / 2) >= Obj[i].Px - (OBJ_W / 2)) && (Px.PanUY - (P_H / 2) <= Obj[i].Py + (OBJ_H / 2)) && (Px.PanUY + (P_H / 2) >= Obj[i].Py - (OBJ_H / 2)) && Obj[i].Flg == OFF) {
			CC = CC + CCA;
		}
	}
}

//--------------------------------------------------------------------------//
//	●	ゲームオーバーカウント
//
//--------------------------------------------------------------------------//
void	EndCounter(void) {
	
	switch (Mode) {
	
	//カウント1
	case	0:
		if (CC >= 1 && CC <= 1) {
			Mode = 1;
			break;
		}
	
	//カウント2
	case	1:
		if (CC >= 72 && CC<= 72) {
			Mode = 2;
			break;
		}

	//カウント3
	case	2:
		if (CC >= 144 && CC <= 144) {
			Mode = 3;
			break;
		}
	}
	if (Mode == 3) {
		SceneChange(RESULT_SCENE);
	}
}

//--------------------------------------------------------------------------//
//	●	具材処理
//
//--------------------------------------------------------------------------//
void	GuzaiMove(void)
{
	if (Flg.MeatF == ON) {
		Px.MeatX = Px.MeatX + D.MeatDX;
	}

	if (Flg.VegiF == ON) {
		Px.VegiX = Px.VegiX + D.VegiDX;
	}

	if (Flg.ChezF == ON) {
		Px.ChezX = Px.ChezX + D.ChezDX;
	}

	
}

//--------------------------------------------------------------------------//
//	●	具材止まる
//
//--------------------------------------------------------------------------//
void	GuzaiStop(void)
{
	if ((Px.PanUX - (P_W / 2) <= Px.ChezX + (G_W / 2)) && (Px.PanUX + (P_W / 2) >= Px.ChezX - (G_W / 2)) && (Px.PanUY - (P_H / 5) <= Px.ChezY + (G_H / 5)) && (Px.PanUY + (P_H / 5) >= Px.ChezY - (G_H / 5)) && Flg.PanMF == ON) {
		Px.ChezY = Px.ChezY + D.ChezDY;
		D.ChezDX = 0.0f;
		D.ChezDY = 9.0f;
	}

	if ((Px.ChezX - (G_W / 2) <= Px.MeatX + (G_W / 2)) && (Px.ChezX + (G_W / 2) >= Px.MeatX - (G_W / 2)) && (Px.ChezY - (G_H / 3.2) <= Px.MeatY + (G_H / 3.2)) && (Px.ChezY + (G_H / 3.2) >= Px.MeatY - (G_H / 3.2))) {
		Px.MeatY = Px.MeatY + D.MeatDy;
		D.MeatDX = 0.0f;
		D.MeatDy = 9.0f;
	}

	if ((Px.MeatX - (G_W / 2) <= Px.VegiX + (G_W / 2)) && (Px.MeatX + (G_W / 2) >= Px.VegiX - (G_W / 2)) && (Px.MeatY - (G_H / 3) <= Px.VegiY + (G_H / 3)) && (Px.MeatY + (G_H / 3) >= Px.VegiY - (G_H / 3))) {
		Px.VegiY = Px.VegiY + D.VegiDY;
		D.VegiDX = 0.0f;
		D.VegiDY = 9.0f;
	}

	if (GageTask == 3) {
		if ((Px.PanUX - (P_W / 2) <= Px.ChezX + (G_W / 2)) && (Px.PanUX + (P_W / 2) >= Px.ChezX - (G_W / 2)) && (Px.PanUY - (P_H / 5) <= Px.ChezY + (G_H / 5)) && (Px.PanUY + (P_H / 5) >= Px.ChezY - (G_H / 5)) && Flg.PanMF == ON) {
			Px.ChezY = Px.ChezY + D.ChezDY;
			D.ChezDX = 0.0f;
			D.ChezDY = 14.0f;
		}

		if ((Px.ChezX - (G_W / 2) <= Px.MeatX + (G_W / 2)) && (Px.ChezX + (G_W / 2) >= Px.MeatX - (G_W / 2)) && (Px.ChezY - (G_H / 3.2) <= Px.MeatY + (G_H / 3.2)) && (Px.ChezY + (G_H / 3.2) >= Px.MeatY - (G_H / 3.2))) {
			Px.MeatY = Px.MeatY + D.MeatDy;
			D.MeatDX = 0.0f;
			D.MeatDy = 14.0f;
		}

		if ((Px.MeatX - (G_W / 2) <= Px.VegiX + (G_W / 2)) && (Px.MeatX + (G_W / 2) >= Px.VegiX - (G_W / 2)) && (Px.MeatY - (G_H / 3) <= Px.VegiY + (G_H / 3)) && (Px.MeatY + (G_H / 3) >= Px.VegiY - (G_H / 3))) {
			Px.VegiY = Px.VegiY + D.VegiDY;
			D.VegiDX = 0.0f;
			D.VegiDY = 14.0f;
		}
	}
}

//--------------------------------------------------------------------------//
//	●	タイマー
//
//--------------------------------------------------------------------------//
void	Timer(void) {

	Game.GameCnt = Game.GameCnt - Game.GameCntApp;

	_timer = Game.GameCnt / 60;

	if (Game.GameCnt <= 0) {
		SceneChange(RESULT_SCENE);
	}

}

//--------------------------------------------------------------------------//
//	●	内部処理	：シーン中の処理、現在のシーンで行う処理
//
//--------------------------------------------------------------------------//
// ゲームメインループ
void	DataOutTime(void) {

	// 出現データテーブルの最後まできたか？
	if (BonTBL[Gm.TimStep].Time != -1) {

		// タイムカウントアップ
		Gm.TimCnt = Gm.TimCnt + 1;

		// テーブル登録タイムと現在のカウントを比較
		if (BonTBL[Gm.TimStep].Time <= Gm.TimCnt) {

			// テーブルデータ通りに生み出し
			ObjBorn(BonTBL[Gm.TimStep].x, BonTBL[Gm.TimStep].y, BonTBL[Gm.TimStep].dx, BonTBL[Gm.TimStep].dy);


			// NEXT LINE
			Gm.TimStep = Gm.TimStep + 1;
			Gm.TimCnt = 0;
		}
	}
}

//--------------------------------------------------------------------------//
void	ObjTask(void)
{
	for (short i = 0; i<OBJ_MAX; i++) {

		if (Obj[i].Flg == ON) {


			// 座標更新
			Obj[i].Px = Obj[i].Px + Obj[i].Dx;
			Obj[i].Py = Obj[i].Py + Obj[i].Dy;

			// 画面外（フレームアウト）で消滅
			if (Obj[i].Px <  -20 + (-OBJ_W) || Obj[i].Px > 1980 + OBJ_W ) {

				Obj[i].Flg = OFF;
			}
		}
	}

}

void	GameLoop(void)
{
	SoundCnt[0] = SoundCnt[0] + SoundApp[0];

	if (SoundCnt[0] >= 1 && SoundCnt[0]<= 1) {
		Gs_PlayBGM(GBGM);
	}

	if (SoundCnt[0] >= 2) {
		SoundCnt[0] = 0;
		SoundApp[0] = 0;
	}

	if ((Px.MeatX - (G_W / 2)) <= 0) {

		D.MeatDX = -(D.MeatDX);
	
		SoundCnt[2] = SoundCnt[2] + SoundApp[2];
	}

	if (SoundCnt[2] >= 1 && SoundCnt[2] <= 1) {
		Gs_PlaySE(Limit);
	}
	if (SoundCnt[2] >= 2) {
		SoundCnt[2] = 0;
		SoundApp[2] = 0;
	}

	if ((Px.MeatX + (G_W / 2)) >= 1920) {
		D.MeatDX = -D.MeatDX;
	}

	if ((Px.ChezX - (G_W / 2)) <= 0) {
		D.ChezDX = -(D.ChezDX);
	}

	if ((Px.ChezX + (G_W / 2)) >= 1920) {
		D.ChezDX = -D.ChezDX;
	}

	if ((Px.VegiX - (G_W / 2)) <= 0) {

		D.VegiDX = -(D.VegiDX);

	}

	if ((Px.VegiX + (G_W / 2)) >= 1920) {
		D.VegiDX = -D.VegiDX;
	}

	if (GFlg == ON) {
		GageStop();
	}
	
	if (GFlg == OFF && GageTask == 1) {
		PanMove1();
		
	}

	if (GFlg == OFF && GageTask == 2) {
		PanMove2();
	}

	if (GFlg == OFF && GageTask == 3) {
		PanMove3();
	}
	GuzaiMove();
	GuzaiStop();
	//BaikinCheck();
	//EndCounter();

	// 出現管理
	//DataOutTime();

	// 生み出し後のオブジェクト処理
	//ObjTask();

	Timer();

}

//--------------------------------------------------------------------------//
//	●	描画		：シーン中の描画、現在のシーンで表示するBMPはここで
//
//--------------------------------------------------------------------------//
// ゲーム画面　描画
void	GameDraw(void)
{
	//絵の一部分を切り抜いて表示

	Gs_DrawLayer(960, 540, BG, 0, 0, 1920, 1080, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);

	for (short i = 0; i < OBJ_MAX; i++) {
		if (Obj[i].Flg == ON) {
			Gs_DrawLayer(Obj[i].Px, Obj[i].Py, Baik, 0, 0, OBJ_W, OBJ_H, OFF, ARGB(255, 255, 254, 255), ON, 0, 0.5f, 0.5f);
		}
	}
	Gs_DrawLayer(Px.VegiX, Px.VegiY, Vegi, 0, 0, G_W, G_H, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	Gs_DrawLayer(Px.MeatX, Px.MeatY, Meat, 0, 0, G_W, G_H, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	Gs_DrawLayer(Px.ChezX, Px.ChezY, Chez, 0, 0, G_W, G_H, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	Gs_DrawLayer(Px.PanDX, Px.PanDY, PanD, 0, 0, P_W, P_H, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	Gs_DrawLayer(Px.PanUX, Px.PanUY, PanU, 0, 0, P_W, P_H, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	if (GDFlg == ON) {
		Gs_DrawLayer(1655, GagePy, Gage, 0, GageH, 62, 586, OFF, ARGB(254, 255, 255, 254), OFF, 0, 1.0f, 1.0f);
		Gs_DrawLayer(1680, 580, GageF, 0, 0, 100, 650, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	}

	Gs_DrawLayer(1770, 75, T_Flame, 0, 0, 300, 150, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);

	if (_timer < 10) {
		Gs_DrawLayer(1772 + NUM_W, 75, TimeNum, _timer * NUM_W, 0, NUM_W, NUM_H, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	}

	else if (_timer >= 10 && _timer < 100) {
		Gs_DrawLayer(1772 - NUM_W / 2, 75, TimeNum, (_timer / 10) * NUM_W, 0, NUM_W, NUM_H, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
		Gs_DrawLayer(1772 + NUM_W / 2, 75, TimeNum, (_timer % 10) * NUM_W, 0, NUM_W, NUM_H, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	}

	else if (_timer >= 100 && _timer < 1000) {
		Gs_DrawLayer(1772 - NUM_W / 2, 75, TimeNum, (_timer / 100) * NUM_W, 0, NUM_W, NUM_H, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
		Gs_DrawLayer(1772 + NUM_W / 2, 75, TimeNum, ((_timer % 100) / 10) * NUM_W, 0, NUM_W, NUM_H, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	}
	//-------------------------------------------------------------------------------------------------------------------------------------------------------//
	Gs_DrawLayer(230, 925, S_Flame, 0, 0, 195, 99, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);

	if (_score < 10)
	{
		Gs_DrawLayer(230, 900, ScoreNum, _score * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);
	}

	else if (_score >= 10 && _score < 100)
	{
		Gs_DrawLayer(230, 900, ScoreNum, (_score / 10) * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);
		Gs_DrawLayer(230 + NUM_W, 900, ScoreNum, (_score % 10) * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);
	}

	else if (_score >= 100 && _score < 1000)
	{
		short a = (_score / 100);

		Gs_DrawLayer(230, 900, ScoreNum, (_score / 100) * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);
		Gs_DrawLayer(230 + NUM_W + 5, 900, ScoreNum, (_score / 10) * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);
		Gs_DrawLayer(230 + (NUM_W * 2) + 5, 900, ScoreNum, (_score % 10) * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);
	}


	//-------------------------------------------------------------------------------------------------------------------------------------------------------//

	Gs_DrawLayer(175, 180, P_Flame, 0, 0, 300, 150, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);

		short	sc[6];

		sc[0] = (Point / 1000000) % 10 ;
		sc[1] = (Point / 100000) % 10;
		sc[2] = (Point / 10000) % 10;
		sc[3] = (Point / 1000) % 10;
		sc[4] = (Point / 100) % 10;
		sc[5] = (Point / 10) % 10;

		Gs_DrawLayer(NUM_X, NUM_Y, PointNum, sc[0] * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);
		Gs_DrawLayer(NUM_X1, NUM_Y, PointNum, sc[1] * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);
		Gs_DrawLayer(NUM_X2, NUM_Y, PointNum, sc[2] * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);
		Gs_DrawLayer(NUM_X3, NUM_Y, PointNum, sc[3] * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);
		Gs_DrawLayer(NUM_X4, NUM_Y, PointNum, sc[4] * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);
		Gs_DrawLayer(NUM_X5, NUM_Y, PointNum, sc[5] * NUM_W, 0, NUM_W, NUM_H, OFF, BETA_COLOR, OFF, 0, 1.0f, 1.0f);	

}
//--------------------------------------------------------------------------//
//	●	ロード		：シーンに入る時、そのシーンで必要なデータの読み込み
//
//--------------------------------------------------------------------------//
short	GameLoad(void)
{
	BG = Gs_LoadBMP("DATA/BMP/インゲーム/背景.PNG");
	PanU = Gs_LoadBMP("DATA/BMP/インゲーム/パン(上側).PNG");
	PanD = Gs_LoadBMP("DATA/BMP/インゲーム/パン(下側).PNG");
	Meat = Gs_LoadBMP("DATA/BMP/インゲーム/肉.PNG");
	Vegi = Gs_LoadBMP("DATA/BMP/インゲーム/野菜.PNG");
	Chez = Gs_LoadBMP("DATA/BMP/インゲーム/チーズ.PNG");
	Gage = Gs_LoadBMP("DATA/BMP/インゲーム/ゲージ中身.PNG");
	GageF = Gs_LoadBMP("DATA/BMP/インゲーム/ゲージ枠.PNG");
	Baik = Gs_LoadBMP("DATA/BMP/インゲーム/バイキンくん.PNG");
	TimeNum = Gs_LoadBMP("DATA/BMP/インゲーム/残り時間(数字).PNG");
	ScoreNum = Gs_LoadBMP("DATA/BMP/インゲーム/残り時間(数字).PNG");
	PointNum = Gs_LoadBMP("DATA/BMP/インゲーム/残り時間(数字).PNG");
	S_Flame = Gs_LoadBMP("DATA/BMP/インゲーム/個数枠.PNG");
	T_Flame = Gs_LoadBMP("DATA/BMP/インゲーム/残り時間枠.PNG");
	P_Flame = Gs_LoadBMP("DATA/BMP/インゲーム/残り時間枠.PNG");
	
	GBGM = Gs_LoadWAVE("DATA/SOUND/インゲーム/インゲームBGM.WAV", ON);
	Drop = Gs_LoadWAVE("DATA/SOUND/インゲーム/ハンバーガー.WAV", OFF);
	Over = Gs_LoadWAVE("DATA/SOUND/インゲーム/タイムオーバー.WAV", OFF);
	Hasa = Gs_LoadWAVE("DATA/SOUND/インゲーム/挟む.WAV", OFF);
	Limit = Gs_LoadWAVE("DATA/SOUND/インゲーム/具材跳ね返り.WAV", ON);

	return		GAME_SCENE;
}

//--------------------------------------------------------------------------//
//	●	後処理		：現在のシーンから抜ける時、データの破棄
//
//--------------------------------------------------------------------------//
void	GameExit(void)
{
	Gs_ReleaseBMP(BG);
	Gs_ReleaseBMP(PanU);
	Gs_ReleaseBMP(PanD);
	Gs_ReleaseBMP(Meat);
	Gs_ReleaseBMP(Vegi);
	Gs_ReleaseBMP(Chez);
	Gs_ReleaseBMP(Gage);
	Gs_ReleaseBMP(GageF);
	Gs_ReleaseBMP(Baik);
	Gs_ReleaseBMP(TimeNum);
	Gs_ReleaseBMP(ScoreNum);
	Gs_ReleaseBMP(PointNum);
	Gs_ReleaseBMP(T_Flame);
	Gs_ReleaseBMP(S_Flame);
	Gs_ReleaseBMP(P_Flame);
	
	Gs_ReleaseSOUND(GBGM);
	Gs_ReleaseSOUND(Limit);
	Gs_ReleaseSOUND(Drop);
	Gs_ReleaseSOUND(Hasa);
	Gs_ReleaseSOUND(Over);

}

//****************************************************************************
//	★　シーンテーブル：各シーンで呼び出される関数の登録
//****************************************************************************

SCENE_TBL	GameSceneTbl = {
		GameLoad,
		GameInit,
		GameLoop,
		GameDraw,
		GameExit
};

//======================================================================================//
//							EOP															//
//======================================================================================//
